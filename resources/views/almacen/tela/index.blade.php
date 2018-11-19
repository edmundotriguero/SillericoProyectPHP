@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Telas <a href="tela/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			@include('almacen.tela.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						
						<th>Opciones</th>
					</thead>
					@foreach ($telas as $t)
					<tr>
						<td>{{ $t->idtela}}</td>
						<td>{{ $t->nombre}}</td>
						
						<td>
							<a href="{{URL::action('TelaController@edit',$t->idtela)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-{{$t->idtela}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.tela.modal')  
					@endforeach
				</table>
			</div>
			{{$telas->render()}}
		</div>
	</div>
@endsection