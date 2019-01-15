<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Saldos  </h3> 
			<?php echo $__env->make('ventas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
				<?php foreach($saldo as $sa): ?>
					<tr>
						<td><?php echo e($sa->id); ?></td>
						<td><?php echo e($sa->idventa); ?></td>
						<td><?php echo e($sa->ingreso); ?></td>
						<td><?php echo e($sa->fecha); ?></td>
						<td><?php echo e($sa->tipoDoc); ?></td>
						<td><?php echo e($sa->numDoc); ?></td>
						<?php if($sa->estado == 1): ?>
						<td>Faltante</td>
						<?php elseif($sa->estado == 2): ?>
						<td>Completado</td>
						<?php else: ?> 
						<td>$sa->estado</td>
						<?php endif; ?>
						
					
						<td>
							<a href="<?php echo e(URL::action('VentasController@crearSaldo',$sa->idventa)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<!-- <a href="" data-target="#modal-delete-<?php echo e($sa->id); ?>" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>-->
						</td>
					</tr>
					<?php /* <?php echo $__env->make('saldo.ventas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
					<?php endforeach; ?>
				</table>
			</div>
			<?php echo e($saldo->render()); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>