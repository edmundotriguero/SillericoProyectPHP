@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Saldos  </h3> 
			@include('ventas.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Id Venta</th>
						<th>Ingreso</th>
						<th>fecha</th>
						<th>Tipo Doc.</th>
						<th>Num Doc.</th>
						<th>estado</th>
						<th>Opciones</th>
					</thead>
				@foreach ($saldo as $sa)
					<tr>
						<td>{{ $sa->id}}</td>
						<td>{{ $sa->idventa}}</td>
						<td>{{ $sa->ingreso}}</td>
						<td>{{ $sa->fecha}}</td>
						<td>{{ $sa->tipoDoc}}</td>
						<td>{{ $sa->numDoc}}</td>
						<td>{{ $sa->estado}}</td>
					
						<td>
							<a href="{{URL::action('VentasController@crearSaldo',$sa->idventa)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<!-- <a href="" data-target="#modal-delete-{{$sa->id}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>-->
						</td>
					</tr>
					{{-- @include('saldo.ventas.modal')--}}
					@endforeach
				</table>
			</div>
			{{ $saldo->render()}}
		</div>
	</div>
@endsection