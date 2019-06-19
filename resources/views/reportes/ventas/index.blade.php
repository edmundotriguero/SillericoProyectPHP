@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<h3>Reporte de Ventas </h3>
		@include('reportes.ventas.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="testTable">
					<thead>
							<th></th>
							<th>desde</th>
							<th>{{date('d/m/Y', strtotime($fechaInicio)) }}</th>
							<th>hasta</th>
							<th>{{date('d/m/Y', strtotime($fechaFinal)) }}</th>
		
						</thead>
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
				<thead>
						<th ></th>
						<th ></th>
						<th ></th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Total ventas</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Total saldos</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Total ingresos</th>
	
					</thead>
	
					<tr class="success">
						<td></td>
						<td></td>
						<td></td>
						<td>{{$sumaVenta}}</td>
						<td>{{$sumaSaldo}}</td>
						<td>{{$sumaIngreso}}</td>
	
	
					</tr>


			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>


<button class="btn fa fa-file-excel-o" aria-hidden="true" onclick="tableToExcel('testTable', 'W3C Example Table')"> Excel</button>


@push ('scripts')
<script>

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

</script>
@endpush

@endsection