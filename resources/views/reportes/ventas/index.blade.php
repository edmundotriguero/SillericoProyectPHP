@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Reporte de Ventas  </h3> 
			@include('reportes.ventas.search')
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
					@php 
						$sumaSaldo = 0;
						$sumaVenta = 0;
						$sumaIngreso = 0;
					@endphp
					@foreach ($ventas as $ven)
					<tr>
						<td>{{ $ven->id}}</td>
						<td>{{ $ven->fechaVenta}}</td>
						<td>{{ $ven->tipoDoc}}</td>
						<td>{{ $ven->numDoc}}</td>

						<td>{{ $ven->cliente}}</td>
						<td>{{ $ven->categoria." ". $ven->sucursal}}</td>
						<td>{{ $ven->costoVenta}}</td>
						<td>{{ $ven->saldo}}</td>
						<td>{{ $ven->ingreso}}</td>
						@php 
							$sumaSaldo = $sumaSaldo + $ven->saldo;
							$sumaVenta = $sumaVenta + $ven->costoVenta ;
							$sumaIngreso = $sumaIngreso + $ven->ingreso ;
						@endphp
						<td>
							<a href="{{URL::action('VentasController@edit',$ven->id)}}"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							
						</td>
					</tr>
					
					@endforeach
				</table>
			</div>
			{{$ventas->render()}}
		</div>
	</div>

	<br/>
	<br/>

	<div class="row text-right ">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Total ventas</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Total saldos</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Total ingresos</th>
						
					</thead>
					
					<tr class="success">
						<td>{{$sumaVenta}}</td>
						<td>{{$sumaSaldo}}</td>
						<td>{{$sumaIngreso}}</td>
						
						
					</tr>
					
					
				</table>
			</div>
			
		</div>
	</div>

@endsection