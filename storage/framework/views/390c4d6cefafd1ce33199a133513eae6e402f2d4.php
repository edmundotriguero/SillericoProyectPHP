<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Producto con codigo:  <?php echo e($producto->codigo); ?></h3>
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
	<?php 
		$aux = 'sin descuento';
		$aux2 = $producto->precio;
	 ?>
	<?php foreach($desc as $d): ?>
		<?php if($d->lote == $producto->lote ): ?>
			<?php /* <td><span class="label label-success"><?php echo e($d->porcentaje."%"); ?></span> <?php echo e($producto->precio-($producto->precio*($d->porcentaje/100))); ?></td> */ ?>
			<?php 
				$aux2 = $producto->precio-($producto->precio*($d->porcentaje/100));
				$aux = $d->porcentaje."%";
			 ?>
			
		<?php endif; ?>
	<?php endforeach; ?>
	<?php /* <?php foreach($desc as $d): ?>
			<?php if($d->lote == $producto->lote ): ?>
				<?php echo e($d->porcentaje."%".$prod->precio-($prod->precio*($d->porcentaje/100))); ?><
					
			<?php endif; ?>
	<?php endforeach; ?> */ ?>
	<div class="alert alert-info" role="alert"><h4>DESCUENTO:  <span class="label label-warning" ><?php echo e($aux); ?></span> Precio con descuento: <span class="label label-success"> <?php echo e($aux2); ?></span></h4></div>
	<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				 <div class="form-group">
					 <label for="idproducto">ID: </label>
					 <label for="idproducto"><?php echo e($producto->idproducto); ?></label>
				 </div>
			 </div>	
	</div>
	<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				 <div class="form-group">
					 <label for="idproducto">LOTE: </label>
					 <input type="text"    class="form-control" value="<?php echo e($producto->lote); ?>" readonly >
				 </div>
			 </div>	
		 </div>
			
		<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Categoria: </label>
					<input type="text"    class="form-control" value="<?php echo e($producto->categoria); ?>" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Sucursal</label>
					<input type="text"    class="form-control" value="<?php echo e($producto->sucursal); ?>" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>fecha codificacion</label>
				<input type="date" name="fechaCod"   class="form-control" value="<?php echo e($producto->fechaCod); ?>" readonly>

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Codigo</label>
				<input type="text" name="codigo"   class="form-control" value="<?php echo e($producto->codigo); ?>" readonly="readonly" >

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Talla</label>
					<input type="text"    class="form-control" value="<?php echo e($producto->talla); ?>" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Tela</label>
					<input type="text"    class="form-control" value="<?php echo e($producto->tela); ?>" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Color</label>
					<input type="text"    class="form-control" value="<?php echo e($producto->color); ?>" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Precio</label>
				<input type="number" name="precio"   class="form-control" value="<?php echo e($producto->precio); ?>" readonly ></input>

                </div>
			</div>


			
		</div>
        <div class="row text-center">  
			<div class="form-group">
				
				<a href="<?php echo e(action('ProductoController@index')); ?>"><div class="btn btn-info" >Volver</div></a>
			</div>
        </div>


			
		
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>