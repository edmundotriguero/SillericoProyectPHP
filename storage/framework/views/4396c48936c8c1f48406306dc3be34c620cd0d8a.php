<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de lotes en general <a href="lote/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			<?php echo $__env->make('almacen.lote.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
	<?php endif; ?>


	<div class="row">

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th >ID</th>
						<th class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >Nombre</th>
						
						<th>Opciones</th>
					</thead>
					<?php foreach($lotes as $lote): ?>
					<tr>
						<td><?php echo e($lote->id); ?></td>
						<td><?php echo e($lote->lote); ?></td>
						<td><?php echo e($lote->porcentaje_descuento); ?></td>
						
						
						<td>
							<a href="<?php echo e(URL::action('LoteController@edit',$lote->id)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-<?php echo e($lote->id); ?>" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
							<a href="<?php echo e(URL::action('LoteController@show',$lote->id)); ?>"><button class="btn fa fa-eye" aria-hidden="true"></button></a>
						</td>
					</tr>
				<?php echo $__env->make('almacen.lote.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
					<?php endforeach; ?>
				</table>
			</div>
			<?php echo e($lotes->render()); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>