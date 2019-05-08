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
											
						
					</thead>
					@php 
						$sumaSaldo = 0;
						$sumaVenta = 0;
						$sumaIngreso = 0;
					@endphp
					@foreach ($ventas as $ven)
					<tr>
						<td>{{ $ven->id}}</td>
						<td>{{date('d/m/Y', strtotime($ven->fechaVenta)) }}</td>
						
						@if ($ven->tipoDoc == 0)
							<td>Factura</td>
						@elseif($ven->tipoDoc == 1)
							<td>Recibo</td>
						@else
							<td>Sin Doc.</td>
						@endif
						<td>{{ $ven->numDoc}}</td>

						<td>{{ $ven->cliente}}</td>
						<td>{{ $ven->codigo." - ".$ven->categoria." ". $ven->sucursal}}</td>
						<td>{{ $ven->costoVenta}}</td>
						<td>{{ $ven->saldo}}</td>
						<td>{{ $ven->ingreso}}</td>
						@php 
							$sumaSaldo = $sumaSaldo + $ven->saldo;
							$sumaVenta = $sumaVenta + $ven->costoVenta ;
							$sumaIngreso = $sumaIngreso + $ven->ingreso ;
						@endphp
					
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