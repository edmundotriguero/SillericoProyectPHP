@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="error">
			<h3>Nuevos movimientos</h3>
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
			

			{!!Form::open(array('url'=>'almacen/movimiento','method'=>'POST','autocomplete'=>'on'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-11">
					<div class="form-group">
						<label for="sidproducto">Producto</label>
						<select name="sidproducto" id="sidproducto" class="form-control selectpicker"  data-live-search="true">
								<option value="">Elige una opción</option>
							@foreach($productos as $prod)
							<option value="{{$prod->idproducto}}">{{$prod->codigo." - ".$prod->categoria." - ".$prod->sucursal."-".$prod->idsuc}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidsucursal">Sucursal Destino</label>
						<select name="sidsucursal" id="sidsucursal" class="form-control selectpicker"  data-live-search="true">
								<option value="">Elige una opción</option>
							@foreach($sucursales as $suc)
							<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sfecha">Fecha</label>
						<input type="date" name="sfecha" id="sfecha" class="form-control" ></input>
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
                    <th>Producto</th>
					<th>Sucursal Origen</th>
					<th>Sucursal Destino</th>
                    <th>Fecha</th>
					
                    </thead>
                    <tfoot>
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
    

    $("#guardar").hide();

    function agregar(){
        idproducto = $("#sidproducto").val();
		producto = $("#sidproducto option:selected").text();
		idSucDestino = $("#sidsucursal").val();
		sucursal = $("#sidsucursal option:selected").text();
		fecha =  $("#sfecha").val();
		aux = producto.split("-");

		idSucOrigen = aux[3];
		

        if (idproducto != ""  ) {
			           
			
            var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+aux[0]+' - '+aux[1]+'</td><td><input type="hidden" name="idSucOrigen[]" value="'+idSucOrigen+'">'+aux[2]+'</td><td><input type="hidden" name="idSucDestino[]" value="'+idSucDestino+'">'+sucursal+'</td><td><input type="hidden" name="fecha[]" value="'+fecha+'">'+fecha+'</td></tr>';
            cont++;
            limpiar();
            
            $("#guardar").show();
            $('#detalles').append(fila);
        }
        else{
            alert("Revice los datos por favor... \n El producto  y el destino son selecciones  obligatorias ");
        }

    }

    function limpiar() {

		//set a id producto a cero o nulo 
        //$("#s").val(codigoNuevo);
        $("#sidproducto").val("");
        
    }

    
    
    function eliminar(index){
       
        
        $("#fila"+index).remove();
        evaluar();
    }

</script>

@endpush
@endsection