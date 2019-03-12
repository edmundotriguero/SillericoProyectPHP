<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Asignar Descuento<?php /*$categoria->nombre*/ ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="page-header">
		<?php if($porcentaje == null): ?>
			No tiene ningun descuento asignado
		<?php else: ?>
			<h4>Este lote ya tiene un descuento: 
				<span class="label label-success">
					<?php echo e($porcentaje->porcentaje." %"); ?>

				</span>	
			</h4>
		<?php endif; ?>
		<small>* Para cambiar de valor solo guarde nuevamente con el nuevo porcentaje de descuento</small>
	</div>
	<?php echo Form::open(array('url'=>'almacen/producto/descStore','method'=>'POST','autocomplete'=>'on')); ?>

	<?php echo e(Form::token()); ?>

		<div class="row">
			
			
		
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Lote</label>
				<input type="text" name="lote"   class="form-control" value="<?php echo e($lote->lote); ?>" readonly  ></input>

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Descuento</label>
				<input type="number" name="desc" min="0" max="100"  class="form-control" value=""  ></input>

                </div>
			</div>


			
		</div>
        <div class="row text-center">  
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="submit">Cancelar</button>
				<a href="<?php echo e(action('ProductoController@index')); ?>"><div class="btn btn-info" >Volver</div></a>
			</div>
        </div>


			<?php echo Form::close(); ?>

		
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>