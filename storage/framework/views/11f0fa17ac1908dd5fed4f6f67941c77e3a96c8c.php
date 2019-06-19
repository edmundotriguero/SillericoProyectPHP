<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<h3>Reporte de Ventas </h3>
		<?php echo $__env->make('reportes.ventas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="testTable">
					<thead>
							<th></th>
							<th>desde</th>
							<th><?php echo e(date('d/m/Y', strtotime($fechaInicio))); ?></th>
							<th>hasta</th>
							<th><?php echo e(date('d/m/Y', strtotime($fechaFinal))); ?></th>
		
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
				<?php 
				$sumaSaldo = 0;
				$sumaVenta = 0;
				$sumaIngreso = 0;
				 ?>
				<?php foreach($ventas as $ven): ?>
				<tr>
					<td><?php echo e($ven->id); ?></td>
					<td><?php echo e(date('d/m/Y', strtotime($ven->fechaVenta))); ?></td>

					<?php if($ven->tipoDoc == 0): ?>
					<td>Factura</td>
					<?php elseif($ven->tipoDoc == 1): ?>
					<td>Recibo</td>
					<?php else: ?>
					<td>Sin Doc.</td>
					<?php endif; ?>
					<td><?php echo e($ven->numDoc); ?></td>

					<td><?php echo e($ven->cliente); ?></td>
					<td><?php echo e($ven->codigo." - ".$ven->categoria." ". $ven->sucursal); ?></td>
					<td><?php echo e($ven->costoVenta); ?></td>
					<td><?php echo e($ven->saldo); ?></td>
					<td><?php echo e($ven->ingreso); ?></td>
					<?php 
					$sumaSaldo = $sumaSaldo + $ven->saldo;
					$sumaVenta = $sumaVenta + $ven->costoVenta ;
					$sumaIngreso = $sumaIngreso + $ven->ingreso ;
					 ?>

				</tr>

				<?php endforeach; ?>
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
						<td><?php echo e($sumaVenta); ?></td>
						<td><?php echo e($sumaSaldo); ?></td>
						<td><?php echo e($sumaIngreso); ?></td>
	
	
					</tr>


			</table>
		</div>
		<?php echo e($ventas->render()); ?>

	</div>
</div>


<button class="btn fa fa-file-excel-o" aria-hidden="true" onclick="tableToExcel('testTable', 'W3C Example Table')"> Excel</button>


<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>