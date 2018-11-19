<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Productos <a href="producto/create"><button class="btn fa fa-plus-square"></button></a> </h3> 
			
		</div>
		<?php echo $__env->make('almacen.producto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Categoria</th>
						<th>Sucursal</th>
						<th>Fecha Cod</th>
						<th>Codigo</th>
						<th>Talla</th>
						<th>Tela</th>
						<th>Precio</th>
						<th>Color</th>
						
						<th>Opciones</th>
					</thead>
					<?php foreach($productos as $prod): ?>
					<tr>
						<td><?php echo e($prod->idproducto); ?></td>
						<td><?php echo e($prod->idcategoria); ?></td>
						<td><?php echo e($prod->idsucursal); ?></td>
						<td><?php echo e($prod->fechaCod); ?></td>
						<td><?php echo e($prod->codigo); ?></td>
						<td><?php echo e($prod->talla); ?></td>
						<td><?php echo e($prod->idtela); ?></td>
						<td><?php echo e($prod->precio); ?></td>
						<td><?php echo e($prod->color); ?></td>
						<td>
							<a href="<?php echo e(URL::action('ProductoController@edit',$prod->idproducto)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a>
							<a href="" data-target="#modal-delete-<?php echo e($prod->idproducto); ?>" data-toggle="modal" ><button class="btn fa fa-trash" aria-hidden="true"></button></a>
						</td>
					</tr>
				<?php echo $__env->make('almacen.producto.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
					<?php endforeach; ?>
				</table>
			</div>
			<?php echo e($productos->render()); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>