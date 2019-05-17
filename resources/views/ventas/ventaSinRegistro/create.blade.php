@extends ('layouts.admin')
@section ('contenido')
<div class="row text-center">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="error">
		<a href="{{action('VentasController@index')}}">
			<div class="btn btn-info"><i class="fa fa-reply-all" aria-hidden="true"> Volver</i></div>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="error">
		<h3>Nuevos registros de ventas</h3>
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


{!!Form::open(array('url'=>'ventas/ventaSinRegistro','method'=>'POST','autocomplete'=>'on'))!!}
{{Form::token()}}



<div class="row">

	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
		<div class="form-group">
			<label for="scliente">Cliente</label>
			<input type="text" name="scliente" id="scliente" class="form-control" autocomplete="true"></input>
		</div>
	</div>

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-4">
		<div class="form-group">
			<label for="sfechaVenta">Fecha Venta</label>
			<input type="date" name="sfechaVenta" id="sfechaVenta" class="form-control"></input>
		</div>
	</div>

	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
		<div class="form-group">
			<label for="sidtipoDoc">Tipo Doc</label>
			<select name="sidtipoDoc" id="sidtipoDoc" class="form-control selectpicker">
				<option value="-">--</option>
				<option value="0">Factura</option>
				<option value="1">Recibo</option>
			</select>

		</div>
	</div>

	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
		<div class="form-group">
			<label for="snumDoc">Numero Doc</label>
			<input type="number" name="snumDoc" id="snumDoc" class="form-control" autocomplete="true"></input>
		</div>
	</div>

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
		<div class="form-group">
			<label for="sprecio" id="identificadorPrecioLavel">Precio</label>
			<input type="number" name="sprecio" id="sprecio" class="form-control" autocomplete="true"></input>
		</div>
	</div>




	<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<input id="checkAdelanto" type="checkbox" aria-label="..."
						onchange="evaluarAdelanto(this.checked);">
				</span>
				<input id="sVenta" type="number" class="form-control" aria-label="..." disabled="true"
					placeholder="Ingrese en caso de primer adelanto El precio de Venta">
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->

	</div>
</div>

<h4>Detalles del producto</h4>

{{-- <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
	<div class="col-lg-3 col-sm-6 col-md-6 col-xs-6">
		<div class="form-group">
			<label for="slote">Lote</label>
			<select name="slote" id="slote" class="form-control selectpicker" data-live-search="true">
				@foreach($lotes as $lote)
				<option value="{{$lote->id}}">{{$lote->lote}}</option>
				@endforeach
			</select>


		</div>
	</div>
</div> --}}


<div class="row">
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
		<div class="form-group">
			<label for="sidcategoria">Categoria</label>
			<select name="sidcategoria" id="sidcategoria" class="form-control selectpicker" data-live-search="true">
				<option value="">Seleccione...</option>
				@foreach($categorias as $cat)
				<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
				@endforeach
			</select>

		</div>
	</div>

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
		<div class="form-group">
			<label for="sidsucursal">Sucursal</label>
			<select name="sidsucursal" id="sidsucursal" class="form-control selectpicker" data-live-search="true">
				<option value="">Seleccione...</option>
				@foreach($sucursales as $suc)
				<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
				@endforeach
			</select>

		</div>
	</div>

	

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
		<div class="form-group">
			<label for="sidtela">Tela</label>
			<select name="sidtela" id="sidtela" class="form-control selectpicker" data-live-search="true">
				<option value="21">Seleccione...</option>
				@foreach($telas as $t)
				<option value="{{$t->idtela}}">{{$t->nombre}}</option>
				@endforeach
			</select>

		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
		<div class="form-group">
			<label for="sidcolor">Color</label>
			<select name="sidcolor" id="sidcolor" class="form-control selectpicker" data-live-search="true">
				<option value="29">Seleccione...</option>
				@foreach($color as $col)
				<option value="{{$col->idcolor}}">{{$col->nombre}}</option>
				@endforeach
			</select>

		</div>
	</div>

	

	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
		<div class="form-group">
			<label for="sidtalla">Talla</label>
			<select name="sidtalla" id="sidtalla" class="form-control selectpicker" data-live-search="true">
				<option value="21">Seleccione...</option>
				@foreach($talla as $tal)
				<option value="{{$tal->idtalla}}">{{$tal->nombre}}</option>
				@endforeach
			</select>

		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group text-center ">
			<label for="bt_add"></label>
			<button type="button" id="bt_add" class="btn btn-primary "><i class="fa fa-plus-square" aria-hidden="true">
					Agregar</i></button>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-body">

					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<div class="table-responsive">
							<table id="detalles"
								class="table table-striped table-bordered table-condensed table-hover ">
								<thead class="bg-blue-active">
									<th>Nro</th>
									<th>Opciones</th>
									<th>Cliente</th>
									<th>Detalle</th>
									<th>Fecha Venta</th>
									<th>Documento</th>
									<th>Venta</th>
									<th>Saldo</th>
									<th>Ingreso</th>

								</thead>
								<tfoot>
									<th>TOTAL</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
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
				<button class="btn btn-danger" type="reset"><i class="fa fa-window-close-o"
						aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}

	@push ('scripts')
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
		cliente =$("#scliente").val();
		idproducto = $("#sidproducto").val();
		// aux1 = $("#sidproducto option:selected").text();
		// aux2 = aux1.split("-");
		// codigo = aux2[0];
		// categoria = aux2[1];
		// color = aux2[2];
		precio = $("#sprecio").val();
		idtipoDoc = $("#sidtipoDoc").val();
		doc = $("#sidtipoDoc option:selected").text();
		numDoc = $("#snumDoc").val();
		fechaVenta = $("#sfechaVenta").val();
		sVenta = $("#sVenta").val();
		checkAdelanto = $("#checkAdelanto").is(":checked");
		checkSaldo = $("#checkSaldo").is(":checked");

		console.log(checkAdelanto);
		
		idcategoria = $("#sidcategoria").val();
        categoria = $("#sidcategoria option:selected").text();
        idsucursal = $("#sidsucursal").val();
		sucursal = $("#sidsucursal option:selected").text();
		idtalla = $("#sidtalla").val();
		talla = $("#sidtalla option:selected").text();
		idcolor = $("#sidcolor").val();
		color = $("#sidcolor option:selected").text();
		idtela = $("#sidtela").val();
		tela = $("#sidtela option:selected").text();
		
		fechaCod = $("#sfechaCod").val();
		codigo = $("#scodigo").val();
		



		saldo = 0;
		//idproducto != "" && precio != "" && idtipoDoc !=""
		
		bandera = 0;

        if ( idproducto != "" && fechaVenta != "" && doc != "" && numDoc != "" && precio != ""   ) {
			precio = parseFloat(precio);
            subtotal[cont]=(precio);
            total=total+subtotal[cont];

           if (checkAdelanto){

			saldo = sVenta- precio;
			
			bandera = 1;

			var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td>'+
			'<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>'+

			'<input type="hidden" name="idsucursal[]" value="'+idsucursal+'">'+
			'<input type="hidden" name="idcategoria[]" value="'+idcategoria+'">'+
			'<input type="hidden" name="idtalla[]" value="'+idtalla+'">'+
			'<input type="hidden" name="idcolor[]" value="'+idcolor+'">'+
			'<input type="hidden" name="idtela[]" value="'+idtela+'">'+
			
			'<td><input type="hidden" name="cliente[]" value="'+cliente+'">'+cliente+'</td>'+
			'<td>'+sucursal+'-'+categoria+'-'+talla+'-'+color+'-'+tela+'</td>'+
			
			'<td><input type="hidden" name="fechaVenta[]" value="'+fechaVenta+'">'+fechaVenta+'</td>'+
			'<td><input type="hidden" name="idtipoDoc[]" value="'+idtipoDoc+'"><input type="hidden" name="numDoc[]" value="'+numDoc+'">'+doc+' - '+numDoc+'</td>'+
			
			'<td><input type="hidden" name="venta[]" value="'+sVenta+'">'+sVenta+'</td>'+
			'<td><input type="hidden" name="saldo[]" value="'+saldo+'">'+saldo+'</td>'+
			'<td><input type="hidden" name="precio[]" value="'+precio+'">'+precio+'</td><input type="hidden" name="bandera" value="'+bandera+'"></tr>';
            cont++;
            limpiar();
            $("#total").html("Bs/.  "+total);
            evaluar();
            $('#detalles').append(fila);


		   } else  {

			bandera = 3;

			   var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td>'+
			'<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>'+
			'<input type="hidden" name="idsucursal[]" value="'+idsucursal+'">'+
			'<input type="hidden" name="idcategoria[]" value="'+idcategoria+'">'+
			'<input type="hidden" name="idtalla[]" value="'+idtalla+'">'+
			'<input type="hidden" name="idcolor[]" value="'+idcolor+'">'+
			'<input type="hidden" name="idtela[]" value="'+idtela+'">'+
			
			'<td><input type="hidden" name="cliente[]" value="'+cliente+'">'+cliente+'</td>'+
			'<td>'+sucursal+'-'+categoria+'-'+talla+'-'+color+'-'+tela+'</td>'+

			'<td><input type="hidden" name="fechaVenta[]" value="'+fechaVenta+'">'+fechaVenta+'</td>'+
			'<td><input type="hidden" name="idtipoDoc[]" value="'+idtipoDoc+'"><input type="hidden" name="numDoc[]" value="'+numDoc+'">'+doc+' - '+numDoc+'</td>'+
			'<td>**</td><td>***</td>'+
			'<td><input type="hidden" name="precio[]" value="'+precio+'">'+precio+'</td><input type="hidden" name="bandera" value="'+bandera+'"></tr>';
            cont++;
            limpiar();
            $("#total").html("Bs/.  "+total);
            evaluar();
            $('#detalles').append(fila);

		   }


			
            
        }
        else{
            alert("revice los datos por favor... \n La fecha de Compra  \n tipo de Documento num Documento y el precio son campos obligatorios ");
        }

    }

    function limpiar() {

		numCodigo = 0;
		separador = "-";
	
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
				document.getElementById("identificadorPrecioLavel").innerHTML = "Adelanto";
				document.getElementById("sVenta").disabled=false;
			}else if(value==false){
				// deshabilitamos
				document.getElementById("identificadorPrecioLavel").innerHTML = "Precio";
				document.getElementById("sVenta").disabled=true;
			}
		}
		

	</script>

	@endpush
	@endsection