@extends ('layouts.admin') 
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="error">
		<h3>registro de saldo</h3>
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-body">

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="table-responsive">
						<table id="" class="table table-striped table-bordered table-condensed table-hover ">
							<thead class="bg-blue-active">
								
								<th>id</th>
								
								<th>fecha</th>
								<th>tipoDoc</th>
								<th>numDoc</th>
								<th>estado</th>
								<th>ingreso</th>

							</thead>
							@foreach ($saldos as $sal)
							<tfoot>
								

								<th>{{ $sal->id}}</th>
								<th>{{ $sal->fecha}}</th>
								<th>{{ $sal->tipoDoc}}</th>
								<th>{{ $sal->numDoc}}</th>
								<th>{{ $sal->estado}}</th>
								<th>{{ $sal->ingreso}}</th>
								
								
							</tfoot>
							@endforeach
							<tbody>

							</tbody>

						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


{!!Form::open(array('action'=>'VentasController@storeSaldos','method'=>'POST','autocomplete'=>'on'))!!} {{Form::token()}}
<div class="row">


	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-4">
		<div class="form-group">
			<label for="sfecha">Fecha</label>
			<input type="date" name="sfecha" id="sfecha" class="form-control"></input>
		</div>
	</div>

	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-6">
		<div class="form-group">
			<label for="sidtipoDoc">Tipo Doc</label>
			<select name="sidtipoDoc" id="sidtipoDoc" class="form-control selectpicker">
							<option value="-">--</option>
							<option value="0">Factura</option>
							<option value="1">Recibo</option>
						</select>

		</div>
	</div>
	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-6">
		<div class="form-group">
			<label for="snumDoc">Numero Doc</label>
			<input type="number" name="snumDoc" id="snumDoc" class="form-control" autocomplete="true"></input>
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
		<div class="form-group">
			<label for="sprecio">Precio</label>
			<input type="number" name="sprecio" id="sprecio" class="form-control" autocomplete="true"></input>
		</div>
	</div>
<input type="hidden" name="idventa" id="idventa" class="form-control" value="{{$idventa}}"></input>
</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	<div class="form-group text-center ">
		<label for="bt_add"></label>
		<button type="button" id="bt_add" class="btn btn-primary "><i class="fa fa-plus-square" aria-hidden="true"> Agregar</i></button>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-body">

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="table-responsive">
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
							<thead class="bg-blue-active">
								<th>Nro</th>
								<th>Opciones</th>
								<th>Fecha </th>
								<th>Documento</th>
								<th>Ingreso</th>
							</thead>
							<tfoot>
								<th>TOTAL</th>
								<th></th>
								<th></th>
								<th></th>
								<th>
									<h4 id="total">Bs/. 0.00</h4>
								</th>
							</tfoot>
							<tbody>

							</tbody>

						</table>
					</div>
				</div>
			</div>

		</div>
		<div class="form-group text-center" id="guardar">
			<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
			<button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
			<button class="btn btn-danger" type="reset"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
		</div>
	</div>
</div>
{!!Form::close()!!} @push ('scripts')
<script>
	$(document).ready(function () {
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont = 1;
    total = 0;
    subtotal = [];

    $("#guardar").hide();

    function agregar(){
		/*  inicio variables   */ 

		precio = $("#sprecio").val();
		idtipoDoc = $("#sidtipoDoc").val();
		doc = $("#sidtipoDoc option:selected").text();
		numDoc = $("#snumDoc").val();
		fecha = $("#sfecha").val();

		saldo = 0;
		idventa = $("#idventa").val();
		
		

        if (  fecha != "" && doc != "" && numDoc != "" && precio != ""   ) {
			precio = parseFloat(precio);
            subtotal[cont]=(precio);
            total=total+subtotal[cont];

			var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td>'+
			'<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>'+
			'<td><input type="hidden" name="fecha[]" value="'+fecha+'">'+fecha+'</td>'+
			'<td><input type="hidden" name="idtipoDoc[]" value="'+idtipoDoc+'"><input type="hidden" name="numDoc[]" value="'+numDoc+'">'+doc+' - '+numDoc+'</td>'+
			'<td><input type="hidden" name="precio[]" value="'+precio+'">'+precio+'</td><input type="hidden" name="idventa" value="'+idventa+'"></tr>';
            cont++;
            limpiar();
            $("#total").html("Bs/.  "+total);
            evaluar();
            $('#detalles').append(fila);
   
        }
        else{
            alert("revice los datos por favor... \n La fecha de Compra  \n tipo de Documento num Documento y el precio son campos obligatorios ");
        }

    }

    function limpiar() {

		numCodigo = 0;
		separador = "-";
	//	if(codigo.indexOf(separador)!= -1){
			//aux = codigo.split(separador);
			//numCodigo = parseInt(aux[1]);
			//numCodigo = numCodigo + 1;
			//codigoNuevo = aux[0]+'-'+numCodigo;
	//	}else{
	//		codigo = parseInt(codigo);
	//		codigoNuevo=codigo+1;
	//	}
		
     //   $("#scodigo").val(codigoNuevo);
        //$("#pprecio_compra").val("");
        //$("#pprecio_venta").val("");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        }
        else {
            $("#guardar").hide();
        }
    }
    
    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("Bs/.  "+total);
        $("#fila"+index).remove();
        evaluar();
    }

	function evaluarSaldo(value)
		{
			if(value==true)
			{
				// habilitamos
				document.getElementById("sSaldo").disabled=false;
			}else if(value==false){
				// deshabilitamos
				document.getElementById("sSaldo").disabled=true;
			}
		}
		function evaluarAdelanto(value)
		{
			if(value==true)
			{
				// habilitamos
				document.getElementById("sVenta").disabled=false;
			}else if(value==false){
				// deshabilitamos
				document.getElementById("sVenta").disabled=true;
			}
		}
</script>



@endpush
@endsection