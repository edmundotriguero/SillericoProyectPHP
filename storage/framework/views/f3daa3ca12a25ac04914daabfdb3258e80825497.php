<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar lote : <?php echo e($lote->lote); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($lote,['method'=>'PATCH','route'=>['almacen.lote.update',$lote->id]]); ?>

            <?php echo e(Form::token()); ?>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="lote">Lote</label>
				<input type="text" name="lote" class="form-control" value="<?php echo e($lote->lote); ?>" placeholder="Lote"></input>
			</div>
			
			<div class="form-group">
				<label for="porcentaje_descuento">Porctaje de descuento</label>
				<input type="number" name="porcentaje_descuento" class="form-control" value="<?php echo e($lote->porcentaje_descuento); ?>" min="0" max="100"></input>
            </div>
        
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>


			<?php echo Form::close(); ?>

		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>