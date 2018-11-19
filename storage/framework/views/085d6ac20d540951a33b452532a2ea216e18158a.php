<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria: <?php echo e($categoria->nombre); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($categoria,['method'=>'PATCH','route'=>['almacen.categoria.update',$categoria->idcategoria]]); ?>

            <?php echo e(Form::token()); ?>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo e($categoria->nombre); ?>" placeholder="Nombre..."></input>
            </div>
        </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Condición</label>
                    <select name="condicion" class="form-control">
                        
                        <?php if($categoria->condicion == '1'): ?>
                        <option value="1" selected>Activar</option>
                        <option value="0" >Desactivar</option>
                        <?php else: ?>
                        <option value="1" >Activar</option>
                        <option value="0" selected>Desactivar</option>
                        <?php endif; ?>
                        
                    </select>
                </div>
            </div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="submit">Cancelar</button>
			</div>


			<?php echo Form::close(); ?>

		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>