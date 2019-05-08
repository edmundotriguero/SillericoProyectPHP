<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Detalles de Lote </h3>
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
					 <label for="idproducto">ID: </label>
					 <label for="idproducto"><?php echo e($lote->id); ?></label>
				 </div>
			 </div>	
	</div>
	<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				 <div class="form-group">
					 <label for="lote">LOTE: </label>
					 <input type="text"    class="form-control" value="<?php echo e($lote->lote); ?>" readonly >
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="desc">DESCUENTO: </label>
					<input type="text"    class="form-control" value="<?php echo e($lote->porcentaje_descuento); ?>" readonly >
			   </div>
		   </div>
	</div>
	
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
			<h3 class="box-title">Productos encontrados: <span class="label label-info" ><?php echo e(count($productos)); ?></span></h3>
		<div class="panel panel-primary" >
			<div class="panel-body">
			
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="table-responsive">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
						<thead class="bg-blue-active">
						<?php 
						$total_real = 0;
						$total_desc = 0;
						$desc = 0;	
						 ?>
						<th>Categoria</th>
						<th>Sucursal</th>
						<th>Codigo</th>
						<th>Fecha Mod</th>
						<th>Talla</th>
						<th>Tela</th>
						<th>Color</th>
						<th>Precio Real</th>
						<th>Precio c/ descuento</th>
						<?php /* etiqueta momentanea */ ?>
						<th>Opciones</th>
						<?php /* fin */ ?>

						<tbody>
							<?php foreach($productos as $prod): ?>
							<tr>
								<?php 
									$desc = 0;
									$desc = $prod->precio - ($prod->precio * $lote->porcentaje_descuento / 100);
									$total_real += $prod->precio;
									$total_desc += $desc;
								 ?>
								<td><?php echo e($prod->categoria); ?> </td>	
								<td><?php echo e($prod->sucursal); ?> </td>	
								<td><?php echo e($prod->codigo); ?> </td>
								<td><?php echo e($prod->fechaCod); ?> </td>
								<td><?php echo e($prod->talla); ?> </td>
								<td><?php echo e($prod->tela); ?> </td>
								<td><?php echo e($prod->color); ?> </td>
								<td><?php echo e($prod->precio); ?> </td>
								<td><?php echo e($desc); ?> </td>
								<?php /* etiqueta momentanea */ ?>
								<td><a href="<?php echo e(URL::action('ProductoController@edit',$prod->idproducto)); ?>"><button class="btn fa fa-refresh" aria-hidden="true"></button></a></td>
								<?php /* fin */ ?>
								
							</tr>
							<?php endforeach; ?>

						</tbody>

						</thead>
						<tfoot>
						<th>TOTAL</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th><h4 id="total">Bs/. <?php echo e($total_real); ?></h4></th>
						
						<th><h4 id="total">Bs/. <?php echo e($total_desc); ?></h4></th>
						</tfoot>
	
					</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>	

			
	
        <div class="row text-center">  
			<div class="form-group">
				
				<a href="<?php echo e(action('LoteController@index')); ?>"><div class="btn btn-info" >Volver</div></a>
			</div>
        </div>


			
		
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>