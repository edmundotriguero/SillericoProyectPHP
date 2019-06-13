<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Detalle documento</h3>
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




<div class="row">
	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-10">
		<div class="form-group">
			<label>Cliente</label>
			<input type="text" name="cliente" class="form-control" value="<?php echo e($venta->cliente); ?>" readonly></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Fecha Venta</label>
			<input type="date" name="fechaVenta" class="form-control" value="<?php echo e($venta->fechaVenta); ?>" readonly></input>

		</div>
	</div>
	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-6">
		<div class="form-group">
			<label for="tipoDoc">Tipo Doc</label>
			<select name="tipoDoc" class="form-control selectpicker" readonly>
				<?php if($venta->tipoDoc == 0): ?>
				<option value="0" selected>Factura</option>
				<?php else: ?>
				<option value="1" selected>Recibo</option>
				<?php endif; ?>
				<option value="-">--</option>
				<option value="0">Factura</option>
				<option value="1">Recibo</option>
			</select>

		</div>
	</div>

	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-10">
		<div class="form-group">
			<label>Nun Doc.</label>
			<input type="text" name="numDoc" class="form-control" value="<?php echo e($venta->numDoc); ?>" readonly></input>

		</div>
	</div>

	

</div>
<br/>
<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="producto">Productos:</label>
	
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Sucursal</th>
						<th>Categoria</th>
						<th>Color</th>
						<th>Talla</th>
						<th>Tela</th>
						<th>Costo Venta</th>
						<th>Saldo</th>
						<th>Ingreso</th>
						<th>Ver Detalle</th>
					</thead>
					<?php 
						$totalVenta = 0;
						$totalSaldo = 0;
						$totalIngreso = 0;
					 ?>
					<?php foreach($productos as $producto): ?>
					<tr>
						<td><?php echo e($producto->codigo); ?></td>
						<td><?php echo e($producto->sucursal); ?></td>
						<td><?php echo e($producto->categoria); ?></td>
						<td><?php echo e($producto->color); ?></td>
						<td><?php echo e($producto->talla); ?></td>
						<td><?php echo e($producto->tela); ?></td>
						<td><?php echo e($producto->venta); ?></td>
						<td><?php echo e($producto->saldo); ?></td>
						<td><?php echo e($producto->ingreso); ?></td>
						<td> 
							<a href="<?php echo e(URL::action('VentasController@show',$producto->idventa)); ?>"><button class="btn fa fa-eye" aria-hidden="true"></button></a>
						</td>
					</tr>
					<?php 
						$totalVenta += $producto->venta;
						$totalSaldo += $producto->saldo;
						$totalIngreso += $producto->ingreso;
					 ?>
					<?php endforeach; ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<th>TOTAL</th>
					<td><?php echo e($totalVenta); ?></td>
					<td><?php echo e($totalSaldo); ?></td>
					<td><?php echo e($totalIngreso); ?></td>
						<td></td>

					</tr>
	
				</table>
			</div>
		</div>
	</div>



<div class="row text-center col-lg-12 col-sm-12 col-md-12 col-xs-10">
	<div class="form-group">

		<a href="<?php echo e(action('VentasController@index')); ?>">
			<div class="btn btn-info">Volver</div>
		</a>
	</div>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>