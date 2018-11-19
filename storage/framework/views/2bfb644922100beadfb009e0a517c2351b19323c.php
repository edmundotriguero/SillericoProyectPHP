<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Productos  </h3> 
			<?php /*<?php echo $__env->make('almacen.producto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="tableProductos" class="table table-striped table-bordered table-condensed table-hover" >
					<thead>
					<tr>
						<th>ID</th>
						<th>Categoria</th>
						<th>Sucursal</th>
						<th>Fecha Cod</th>
						<th>Codigo</th>
						<th>Talla</th>
						<th>Tela</th>
						<th>Precio</th>
						<th>Color</th>
						
					</tr>
						
				</thead>
				<tbody>
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
						
						
					</tr>
				<?php endforeach; ?>
					
				</tbody>
				</table>
			</div>
			<?php /*$productos->render()*/ ?>
		</div>
	</div>
	<?php $__env->startPush('scripts'); ?>
<script>
	$(document).ready( function () {
	$('#tableProductos').DataTable();
	
	
} );
</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>