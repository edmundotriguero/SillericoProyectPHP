 
<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Registro de movimientos
			<a href="movimiento/create"><button class="btn fa fa-plus-square"></button><span class="badge badge-success">por producto</span></a>
			<a href="createLote"><button class="btn fa fa-plus-square"></button><span class="badge badge-success">por lote</span></a>
		</h3>

	</div>
	<?php echo $__env->make('almacen.movimiento.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Categoria</th>
					<th>Codigo</th>
					<th>Sucursal Origen</th>
					<th>Sucursal Destino</th>
					<th>Fecha</th>
					<th>Opciones</th>
				</thead>
				<?php foreach($movimientos as $mov): ?>
				<tr>
					<td><?php echo e($mov->idmovimiento); ?></td>
					<td><?php echo e($mov->categoria); ?></td>
					<td><?php echo e($mov->codigo); ?></td>
					<?php foreach($sucursales as $suc): ?> <?php if($suc->idsucursales == $mov->idSucOrigen): ?>
					<td><?php echo e($suc->nombre); ?></td>

					<?php endif; ?> <?php endforeach; ?> <?php foreach($sucursales as $suc): ?> <?php if($suc->idsucursales == $mov->idSucDestino): ?>
					<td><?php echo e($suc->nombre); ?></td>

					<?php endif; ?> <?php endforeach; ?>


					<td><?php echo e(date("d/m/Y", strtotime($mov->fecha))); ?></td>
					<td>
						<a href="" data-target="#modal-delete-<?php echo e($mov->idmovimiento); ?>" data-toggle="modal"><button class="btn fa fa-trash" aria-hidden="true"></button></a>
					</td>
				</tr>
	<?php echo $__env->make('almacen.movimiento.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endforeach; ?>
			</table>
		</div>
		<?php echo e($movimientos->render()); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>