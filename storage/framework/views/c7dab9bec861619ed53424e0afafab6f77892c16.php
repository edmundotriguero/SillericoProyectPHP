<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Detalle venta: <?php echo e($venta->id); ?></h3>
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
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="producto">Producto:</label>

			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Sucursal</th>
					<th>Categoria</th>
					<th>Color</th>
					<th>Talla</th>
					<th>Tela</th>
				</thead>
				<?php foreach($productos as $producto): ?>
				<tr>
					<td><?php echo e($producto->codigo); ?></td>
					<td><?php echo e($producto->sucursal); ?></td>
					<td><?php echo e($producto->categoria); ?></td>
					<td><?php echo e($producto->color); ?></td>
					<td><?php echo e($producto->talla); ?></td>
					<td><?php echo e($producto->tela); ?></td>
				</tr>
				<?php endforeach; ?>
				

			</table>
		</div>
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
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Precio Venta</label>
			<input type="number" name="costoventa" class="form-control" value="<?php echo e($venta->costoVenta); ?>" readonly></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Saldo</label>
			<input type="number" name="saldo" class="form-control" value="<?php echo e($venta->saldo); ?>" readonly></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Ingreso</label>
			<input type="number" name="ingreso" class="form-control" value="<?php echo e($venta->ingreso); ?>" readonly></input>

		</div>
	</div>

</div>
<h3>Detalles de Pago </h3>
<?php if(count($saldos) != 0): ?>
<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<div class="table-responsive">
							<table id="" class="table table-striped table-bordered table-condensed table-hover ">
								<thead class="bg-blue-active">
									<th>id</th>
									<th>fecha</th>
									<th>tipoDoc</th>
									<th>numDoc</th>
									<?php /*<th>estado</th>*/ ?>
									<th>ingreso</th>
								</thead>
								
								<?php  $sum = 0;  ?>
								<?php foreach($saldos as $sal): ?>
								<tfoot>
									<th><?php echo e($sal->id); ?></th>
									<th><?php echo e(date('d/m/Y', strtotime($sal->fecha))); ?></th>
									<?php if($sal->tipoDoc == 0 ): ?>
									<th>Factura</th>
									<?php elseif($sal->tipoDoc == 1): ?>
									<th>Recibo</th>
									<?php else: ?>
									<th>Sin Doc </th>
									<?php endif; ?>
	
									<th><?php echo e($sal->numDoc); ?></th>
									<?php /*<th><?php echo e($sal->estado); ?></th>*/ ?>
									<th><?php echo e($sal->ingreso); ?></th>
									<?php  $sum = $sum + $sal->ingreso;  ?>
								</tfoot>
								<?php endforeach; ?>
								<tbody>
	
								</tbody>
							</table>
	
							<table id="" class="table table-striped table-bordered table-condensed table-hover ">
								<thead class="bg-blue-active">
	
									<th>Precio de Venta</th>
									<th>Pagado</th>
									<th>Por pagar</th>
								</thead>
	
								<tfoot>
	
									<th><?php echo e($venta->costoVenta); ?></th>
									<th><?php echo e($sum); ?></th>
									<?php  $saldoPorPagar = $venta->costoVenta - $sum ;  ?>
									<th><?php echo e($saldoPorPagar); ?></th>
								</tfoot>
	
							</table>
						</div>
					</div>
				</div>
	
			</div>
		</div>
	</div>
<?php else: ?>
<h5>Sin detalle de saldo</h5>

<?php endif; ?>




<div class="row text-center col-lg-12 col-sm-12 col-md-12 col-xs-10">
	<div class="form-group">

		<a href="<?php echo e(action('VentasController@index')); ?>">
			<div class="btn btn-info">Volver</div>
		</a>
	</div>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>