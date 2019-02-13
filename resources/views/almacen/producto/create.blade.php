@extends ('layouts.admin')
@section ('contenido')
	<div class="row text-center">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="error">
		<a href="{{action('ProductoController@index')}}"><div class="btn btn-info" ><i class="fa fa-reply-all" aria-hidden="true"> Volver</i></div></a>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="error">
			<h3>Nuevos registros de productos</h3>
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
			

			{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'on'))!!}
			{{Form::token()}}
			<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="slote">Lote</label>
						<input type="text" name="slote" id="slote" class="form-control" ></input>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidcategoria">Categoria</label>
						<select name="sidcategoria" id="sidcategoria" class="form-control selectpicker"  data-live-search="true">
							@foreach($categorias as $cat)
							<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidsucursal">Sucursal</label>
						<select name="sidsucursal" id="sidsucursal" class="form-control selectpicker"  data-live-search="true">
							@foreach($sucursales as $suc)
							<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sfechaCod">Fecha Cod</label>
						<input type="date" name="sfechaCod" id="sfechaCod" class="form-control" ></input>
					</div>
				</div>

			
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="scodigo">Codigo</label>
						<input type="text" name="scodigo" id="scodigo"  class="form-control" autocomplete="true" ></input>
					</div>
				</div>
			
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidtalla">Talla</label>
						<select name="sidtalla" id="sidtalla" class="form-control selectpicker"  data-live-search="true">
							@foreach($talla as $tal)
							<option value="{{$tal->idtalla}}">{{$tal->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidtela">Tela</label>
						<select name="sidtela" id="sidtela" class="form-control selectpicker"  data-live-search="true">
							@foreach($telas as $t)
							<option value="{{$t->idtela}}">{{$t->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidcolor">Color</label>
						<select name="sidcolor" id="sidcolor" class="form-control selectpicker"  data-live-search="true">
							@foreach($color as $col)
							<option value="{{$col->idcolor}}">{{$col->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sprecio">Precio</label>
						<input type="number" name="sprecio" id="sprecio"  class="form-control" autocomplete="true" ></input>
					</div>
				</div>

				
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group text-center ">
							<label for="bt_add"></label>
						<button type="button" id="bt_add" class="btn btn-primary "><i class="fa fa-plus-square" aria-hidden="true"> Agregar</i></button>
					</div>
				</div>
			</div>		
		

	
<div class="row">
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
    <div class="panel panel-primary" >
        <div class="panel-body">
        
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="table-responsive">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
                    <thead class="bg-blue-active">
					<th>Nro</th>
                    <th>Opciones</th>
                    <th>Categoria</th>
					<th>Sucursal</th>
					<th>Codigo</th>
                    <th>Fecha Mod</th>
					<th>Talla</th>
					<th>Tela</th>
					<th>Color</th>
					<th>Precio</th>
					
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
                    <th><h4 id="total">Bs/. 0.00</h4></th>
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
	var xlote;
	var fecha = new Date();
	xlote = fecha.getDate()+""+(fecha.getMonth()+1)+""+fecha.getFullYear()+"_"+fecha.getHours()+""+fecha.getMinutes()+""+fecha.getSeconds();
	console.log(xlote);
	
	//console.log("Hora: "+fecha.getHours()+"\nMinuto: "+fecha.getMinutes()+"\nSegundo: "+fecha.getSeconds()+"\nMilisegundo: "+fecha.getMilliseconds());
    $("#guardar").hide();
	$('#slote').val(xlote);


    function agregar(){
        idcategoria = $("#sidcategoria").val();
        categoria = $("#sidcategoria option:selected").text();
        idsucursal = $("#sidsucursal").val();
		sucursal = $("#sidsucursal option:selected").text();
		idtalla = $("#sidtalla").val();
		talla = $("#sidtalla option:selected").text();
		idcolor = $("#sidcolor").val();
		color = $("#sidcolor option:selected").text();
		fechaCod = $("#sfechaCod").val();
		codigo = $("#scodigo").val();
		
		idtela = $("#sidtela").val();
		tela = $("#sidtela option:selected").text();
		precio = $("#sprecio").val();
		
		

        if (codigo != "" && precio != "" ) {
			precio = parseFloat(precio);
            subtotal[cont]=(precio);
            total=total+subtotal[cont];

           
			
            var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idcategoria[]" value="'+idcategoria+'">'+categoria+'</td><td><input type="hidden" name="idsucursal[]" value="'+idsucursal+'">'+sucursal+'</td><td><input type="text" name="codigo[]" value="'+codigo+'"></td><td><input type="date" name="fechaCod[]" value="'+fechaCod+'"></td><td><input type="hidden" name="idtalla[]" value="'+idtalla+'">'+talla+'</td><td><input type="hidden" name="idtela[]" value="'+idtela+'">'+tela+'</td><td><input type="hidden" name="idcolor[]" value="'+idcolor+'">'+color+'</td><td><input type="number" name="precio[]" value="'+precio+'"></td></tr>';
            cont++;
            limpiar();
            $("#total").html("Bs/.  "+total);
            evaluar();
            $('#detalles').append(fila);
        }
        else{
            alert("revice los datos por favor... \n El Codigo y el precio son campos obligatorios ");
        }

    }

    function limpiar() {

		numCodigo = 0;
		separador = "/";
		if(codigo.indexOf(separador)!= -1){
			aux = codigo.split(separador);
			numCodigo = parseInt(aux[1]);
			numCodigo = numCodigo + 1;
			codigoNuevo = aux[0]+'/'+numCodigo;
		}else{
			codigo = parseInt(codigo);
			codigoNuevo=codigo+1;
		}
		
        $("#scodigo").val(codigoNuevo);
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

</script>

@endpush
@endsection