@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Productos  </h3> 
			
		</div>
		@include('invitado.search')
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Categoria</th>
						<th>Sucursal</th>
						<th>Fecha Cod</th>
						<th>Codigo</th>
						<th>Talla</th>
						<th>Tela</th>
						<th>Precio</th>
						<th>Color</th>
						
						
					</thead>
					@foreach ($productos as $prod)
					<tr>
						<td>{{ $prod->idproducto}}</td>
						<td>{{ $prod->idcategoria}}</td>
						<td>{{ $prod->idsucursal}}</td>
						<td>{{ $prod->fechaCod}}</td>
						<td>{{ $prod->codigo}}</td>
						<td>{{ $prod->talla}}</td>
						<td>{{ $prod->idtela}}</td>
						<td>{{ $prod->precio}}</td>
						<td>{{ $prod->color}}</td>
						
					</tr>
				
					@endforeach
				</table>
			</div>
			{{$productos->render()}}
		</div>
	</div>
@endsection