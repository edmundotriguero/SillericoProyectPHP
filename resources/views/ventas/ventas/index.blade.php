@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Ventas <a href="ventas/create"><button class="btn fa fa-plus-square"></button></a>  <a href="indexSaldo"> <button class="btn fa fa-balance-scale"></button></a> </h3> 
			@include('ventas.ventas.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Fecha Venta</th>
						<th>Tipo Doc.</th>
						<th>Num Doc.</th>
						<th>Cliente</th>
						<th>Detalle</th>
						
						<th>Venta</th>
						<th>Saldo</th>
						<th>Ingreso</th>
											
						<th>Opciones</th>
					</thead>
					@foreach ($ventas as $ven)
					<tr>
						<td>{{ $ven->id}}</td>
						<td>{{ date('d/m/Y', strtotime($ven->fechaVenta)) }}</td>
						@if ($ven->tipoDoc == 0)
							<td>Factura</td>
						@elseif( $ven->tipoDoc == 1)
							<td>Recibo</td>
						@else 
							<td>Sin Doc.</td>
						@endif
						
						<td>{{ $ven->numDoc}}</td>
						<td>{{ $ven->cliente}}</td>
						<td>{{ $ven->codigo .' - '.$ven->categoria}}</td>
						<td>{{ $ven->costoVenta}}</td>
						<td>{{ $ven->saldo}}</td>
						<td>{{ $ven->ingreso}}</td>
						<td>
							{{--<a href="{{URL::action('VentasController@edit',$ven->id)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>--}}
							<a href="" data-target="#modal-delete-{{$ven->id}}" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
					@include('ventas.ventas.modal')  
					@endforeach
				</table>
			</div>
			{{$ventas->render()}}
		</div>
	</div>
@endsection