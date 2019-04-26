@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="error">
			<h3>Nuevos </h3>
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
			

			{!!Form::open(array('action'=>'MovimientoController@storeMovLote','method'=>'POST','autocomplete'=>'on'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-11">
					<div class="form-group">
						<label for="idlote">LOTE</label>
						<select name="idlote" id="idlote" class="form-control selectpicker"  data-live-search="true">
								<option value="">Elige una opción</option>
							@foreach($lotes as $lote)
							<option value="{{$lote->id}}">{{$lote->lote." - ".$lote->porcentaje_descuento." % descuento"}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidsucursal">Sucursal Destino</label>
						<select name="idsucursal" id="idsucursal" class="form-control selectpicker"  data-live-search="true">
								<option value="">Elige una opción</option>
							@foreach($sucursales as $suc)
							<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
							@endforeach
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" id="fecha" class="form-control" ></input>
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
                    <th>Producto</th>
					<th>Sucursal Origen</th>
					
                    
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody id="datos">

                    </tbody>

				</table>
				</div>
            </div>
		</div>
		
	</div>
	<div class="form-group text-center" id="guardar">
			<input name="_token" value="{{ csrf_token() }}" type="hidden" id="token"></input>
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
			// agregar();
			// inicio prueba ajax 
			
			
			var datos = $("#datos");
			var route = "movLista";
			var idlote = $("#idlote").val();
			var token = $("#token").val();

			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				data: {idlote: idlote},

				success: function(res){
					
					$(res).each(function(key,value){
					datos.append("<tr class='fila'><td>"+(key+1)+"</td><td>"+value.lote+" - "+value.producto+" - "+value.categoria+"</td><td>"+value.sucursal+"</td></tr>")
				});
				}
			});
			 

			// $.get(route, function(res){
			// 	$(res).each(function(key,value){
			// 		datos.append("<tr><td>"+value.categoria+"</td></tr>")
			// 	});
			// });


			// fin prueba ajax

        });
    });
	
	$("#idlote").change(function(){
		$(".fila").remove();
	});

</script>

@endpush
@endsection