<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Categorias <a href="categoria/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			<?php echo $__env->make('almacen.categoria.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th >ID</th>
						<th class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >Nombre</th>
						
						<th>Opciones</th>
					</thead>
					<?php foreach($categorias as $cat): ?>
					<tr>
						<td><?php echo e($cat->idcategoria); ?></td>
						<td><?php echo e($cat->nombre); ?></td>
						
						
						<td>
							<a href="<?php echo e(URL::action('CategoriaController@edit',$cat->idcategoria)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-<?php echo e($cat->idcategoria); ?>" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				<?php echo $__env->make('almacen.categoria.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
					<?php endforeach; ?>
				</table>
			</div>
			<?php echo e($categorias->render()); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>