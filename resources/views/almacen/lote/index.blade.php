@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de lotes en general <a href="lote/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			@include('almacen.lote.search')
		</div>
	</div>
	@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
	@endif


	<div class="row">

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th >ID</th>
						<th class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >Nombre</th>
						
						<th>Descuento</th>
						<th>Opciones</th>
					</thead>
					@foreach ($lotes as $lote)
					<tr>
						<td>{{ $lote->id}}</td>
						<td>{{ $lote->lote}}</td>
						<td>{{ $lote->porcentaje_descuento}} %</td>
						
						
						<td>
							<a href="{{URL::action('LoteController@edit',$lote->id)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-{{$lote->id}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
							<a href="{{URL::action('LoteController@show',$lote->id)}}"><button class="btn fa fa-eye" aria-hidden="true"></button></a>
						</td>
					</tr>
				@include('almacen.lote.modal')  
					@endforeach
				</table>
			</div>
			{{$lotes->render()}}
		</div>
	</div>
@endsection