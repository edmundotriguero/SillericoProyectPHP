@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Categorías <a href="categoria/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			@include('almacen.categoria.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th >ID</th>
						<th class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >Nombre</th>
						
						<th>Opciones</th>
					</thead>
					@foreach ($categorias as $cat)
					<tr>
						<td>{{ $cat->idcategoria}}</td>
						<td>{{ $cat->nombre}}</td>
						
						
						<td>
							<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.categoria.modal')  
					@endforeach
				</table>
			</div>
			{{$categorias->render()}}
		</div>
	</div>
@endsection