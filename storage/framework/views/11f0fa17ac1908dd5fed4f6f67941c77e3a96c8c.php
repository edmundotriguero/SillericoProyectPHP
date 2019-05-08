<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Reporte de Ventas  </h3> 
			<?php echo $__env->make('reportes.ventas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
				</table>
			</div>
			<?php echo e($ventas->render()); ?>

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
						<td><?php echo e($sumaVenta); ?></td>
						<td><?php echo e($sumaSaldo); ?></td>
						<td><?php echo e($sumaIngreso); ?></td>
						
						
					</tr>
					
					
				</table>
			</div>
			
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>