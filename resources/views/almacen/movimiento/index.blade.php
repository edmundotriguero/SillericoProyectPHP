@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Movimientos <a href="movimiento/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			
		</div>
		@include('almacen.movimiento.search')
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Categoria</th>
						<th>Codigo</th>
						<th>Sucursal Origen</th>
						<th>Sucursal Destino</th>
						<th>Opciones</th>
					</thead>
				@foreach ($movimientos as $mov)
					<tr>
						<td>{{ $mov->idmovimiento}}</td>
						<td>{{ $mov->categoria}}</td>
						<td>{{ $mov->codigo}}</td>
						@foreach($sucursales as $suc)
							@if($suc->idsucursales == $mov->idSucOrigen)
							<td>{{ $suc->nombre}}</td>
							
							@endif
						@endforeach
						@foreach($sucursales as $suc)
							@if($suc->idsucursales == $mov->idSucDestino)
							<td>{{ $suc->nombre}}</td>
							
							@endif
						@endforeach

						
						
						<td>
							<a href="" data-target="#modal-delete-{{$mov->idmovimiento}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.movimiento.modal')  
					@endforeach
				</table>
			</div>
			{{$movimientos->render()}}
		</div>
	</div>
@endsection