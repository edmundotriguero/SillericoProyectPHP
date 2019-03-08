@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Productos <a href="producto/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
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
		@include('almacen.producto.search')
	</div>
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-title">Productos encontrados: <span class="label label-info" >{{$productos->total()}}</span></h3>
		  <div class="box-tools pull-right">
			<a href="{{URL::action('ExcelReportController@excel_producto',$idtal.'-'.$idcat.'-'.$idsuc)}}"><button class="btn fa fa-file-excel-o" aria-hidden="true"> Excel</button></a>
		  </div>
		
		</div>
	
	  </div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			{{$productos->appends(['searchText' => $searchText,"idcat"=>$idcat,"idtel"=>$idtel,"idcol"=>$idcol,"idsuc"=>$idsuc,"idtal"=>$idtal,"precio"=>$precio,"nombreTalla"=>$nombreTalla])->links()}}

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
						@php
							$aux = 0;
						@endphp
						@foreach ($desc as $d)
							@if ($d->lote == $prod->lote )
								<td><span class="label label-success">{{$d->porcentaje."%"}}</span> {{$prod->precio-($prod->precio*($d->porcentaje/100))}}</td>
								@php
								$aux = 1;
								@endphp
							@else	
							@endif
						@endforeach
						@if ($aux == 0)
							<td>no</td>
						@endif
						<td>
							<a href="{{URL::action('ProductoController@desc',$prod->idproducto)}}"><button class="btn fa fa-scissors" aria-hidden="true"></button></a>
							<a href="{{URL::action('ProductoController@show',$prod->idproducto)}}"><button class="btn fa fa-eye" aria-hidden="true"></button></a>
							<a href="{{URL::action('ProductoController@edit',$prod->idproducto)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.producto.modal')  
					@endforeach
				</table>
			</div>

		</div>
	</div>
@endsection