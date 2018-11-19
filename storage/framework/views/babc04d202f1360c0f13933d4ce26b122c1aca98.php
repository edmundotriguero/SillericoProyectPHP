<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Ventas <a href="ventas/create"><button class="btn fa fa-plus-square"></button></a>  <a href="indexSaldo"> <button class="btn fa fa-balance-scale"></button></a> </h3> 
			<?php echo $__env->make('ventas.ventas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
					<?php foreach($ventas as $ven): ?>
					<tr>
						<td><?php echo e($ven->id); ?></td>
						<td><?php echo e($ven->fechaVenta); ?></td>
						<td><?php echo e($ven->tipoDoc); ?></td>
						<td><?php echo e($ven->numDoc); ?></td>
						<td><?php echo e($ven->cliente); ?></td>
						<td><?php echo e($ven->categoria); ?></td>
						<td><?php echo e($ven->costoVenta); ?></td>
						<td><?php echo e($ven->saldo); ?></td>
						<td><?php echo e($ven->ingreso); ?></td>
						<td>
							<a href="<?php echo e(URL::action('VentasController@edit',$ven->id)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-<?php echo e($ven->id); ?>" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
					<?php echo $__env->make('ventas.ventas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
					<?php endforeach; ?>
				</table>
			</div>
			<?php echo e($ventas->render()); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>