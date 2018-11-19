@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Sucursales  <a href="sucursal/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			@include('almacen.sucursal.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th >ID</th>
						<th  >Nombre</th>
						<th  >Dirección</th>
						<th>Opciones</th>
					</thead>
					@foreach ($sucursales as $suc)
					<tr>
						<td>{{ $suc->idsucursales}}</td>
						<td>{{ $suc->nombre}}</td>
						<td>{{ $suc->direccion}}</td>
						
						
						<td>
							<a href="{{URL::action('SucursalController@edit',$suc->idsucursales)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-{{$suc->idsucursales}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.sucursal.modal')  
					@endforeach
				</table>
			</div>
			{{$sucursales->render()}}
		</div>
	</div>
@endsection