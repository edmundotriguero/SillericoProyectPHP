<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Prodcuto: <?php /*$categoria->nombre*/ ?></h3>
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
			<?php echo Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->idproducto]]); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idproducto">ID: </label>
					<label for="idproducto"><?php echo e($producto->idproducto); ?></label>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Categoria</label>
					<select name="idcategoria" class="form-control">
						<?php foreach($categoria as $cat): ?>
						<?php if($cat->idcategoria==$producto->idproducto): ?>
						<option value="<?php echo e($cat->idcategoria); ?>" selected><?php echo e($cat->nombre); ?></option>
						<?php else: ?>
						<option value="<?php echo e($cat->idcategoria); ?>" ><?php echo e($cat->nombre); ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Sucursal</label>
					<select name="idsucursal" class="form-control">
						<?php foreach($sucursal as $suc): ?>
						<?php if($suc->idsucursales==$producto->idsucursal): ?>
						<option value="<?php echo e($suc->idsucursales); ?>" selected><?php echo e($suc->nombre); ?></option>
						<?php else: ?>
						<option value="<?php echo e($suc->idsucursales); ?>" ><?php echo e($suc->nombre); ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Sucursal</label>
				<input type="date" name="fechaCod"   class="form-control" value="<?php echo e($producto->fechaCod); ?>" ></input>

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Codigo</label>
				<input type="text" name="codigo"   class="form-control" value="<?php echo e($producto->codigo); ?>" readonly="readonly" ></input>

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Talla</label>
					<select name="idtalla" class="form-control">
						<?php foreach($talla as $tal): ?>
						<?php if($tal->idtalla==$producto->idtalla): ?>
						<option value="<?php echo e($tal->idtalla); ?>" selected><?php echo e($tal->nombre); ?></option>
						<?php else: ?>
						<option value="<?php echo e($tal->idtalla); ?>" ><?php echo e($tal->nombre); ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Tela</label>
					<select name="idtela" class="form-control">
						<?php foreach($tela as $tel): ?>
						<?php if($tel->idtela==$producto->idtela): ?>
						<option value="<?php echo e($tel->idtela); ?>" selected><?php echo e($tel->nombre); ?></option>
						<?php else: ?>
						<option value="<?php echo e($tel->idtela); ?>" ><?php echo e($tel->nombre); ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Color</label>
					<select name="idcolor" class="form-control">
						<?php foreach($color as $col): ?>
						<?php if($col->idcolor==$producto->idcolor): ?>
						<option value="<?php echo e($col->idcolor); ?>" selected><?php echo e($col->nombre); ?></option>
						<?php else: ?>
						<option value="<?php echo e($col->idcolor); ?>" ><?php echo e($col->nombre); ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Precio</label>
				<input type="number" name="precio"   class="form-control" value="<?php echo e($producto->precio); ?>"  ></input>

                </div>
			</div>


			
		</div>
        <div class="row text-center">  
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="submit">Cancelar</button>
			</div>
        </div>


			<?php echo Form::close(); ?>

		
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>