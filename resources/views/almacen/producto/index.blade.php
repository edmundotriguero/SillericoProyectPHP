@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Productos <a href="producto/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			
		</div>
		@include('almacen.producto.search')
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
						
						<th>Desc</th>
						<th>Opciones</th>
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
						@foreach ($desc as $d)
							@if ($d->lote == $prod->lote )
								<td><span class="label label-success">{{$d->porcentaje."%"}}</span> {{$prod->precio-($prod->precio*($d->porcentaje/100))}}</td>
							@else
								<td>{{ $prod->lote}}</td>
							@endif
						@endforeach
						
						<td>
								<a href="{{URL::action('ProductoController@desc',$prod->idproducto)}}"><button class="btn fa fa-scissors" aria-hidden="true"></button></a>
							<a href="{{URL::action('ProductoController@edit',$prod->idproducto)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.producto.modal')  
					@endforeach
				</table>
			</div>
			{{$productos->appends(['searchText' => $searchText,"idcat"=>$idcat,"idsuc"=>$idsuc,"idtal"=>$idtal,"precio"=>$precio,"nombreTalla"=>$nombreTalla])->links()}}
		</div>
	</div>
@endsection