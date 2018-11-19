<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Telas <a href="tela/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			<?php echo $__env->make('almacen.tela.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						
						<th>Opciones</th>
					</thead>
					<?php foreach($telas as $t): ?>
					<tr>
						<td><?php echo e($t->idtela); ?></td>
						<td><?php echo e($t->nombre); ?></td>
						
						<td>
							<a href="<?php echo e(URL::action('TelaController@edit',$t->idtela)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-<?php echo e($t->idtela); ?>" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				<?php echo $__env->make('almacen.tela.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
					<?php endforeach; ?>
				</table>
			</div>
			<?php echo e($telas->render()); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>