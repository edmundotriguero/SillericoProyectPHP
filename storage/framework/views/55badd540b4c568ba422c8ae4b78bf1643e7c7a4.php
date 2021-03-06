<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Color </h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::open(array('url'=>'almacen/color','method'=>'POST','autocomplete'=>'off')); ?>

			<?php echo e(Form::token()); ?>

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre"></input>
			</div>
			
			<div class="form-group text-center">
				<button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
				<button class="btn btn-danger" type="reset"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
				<a href="<?php echo e(action('ColorController@index')); ?>"><div class="btn btn-info" ><i class="fa fa-reply-all" aria-hidden="true"></i></div></a>
			</div>


			<?php echo Form::close(); ?>

		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>