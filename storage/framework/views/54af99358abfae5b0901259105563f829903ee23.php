<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Productos </h3> 
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
		<?php echo $__env->make('almacen.producto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-title">Productos encontrados: <span class="label label-info" ><?php echo e($productos->total()); ?></span></h3>
		  <div class="box-tools pull-right">
			<a href="<?php echo e(URL::action('ExcelReportController@excel_producto',$idtal.'-'.$idcat.'-'.$idsuc)); ?>"><button class="btn fa fa-file-excel-o" aria-hidden="true"> Excel</button></a>
		  </div>
		
		</div>
	
	  </div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php echo e($productos->appends(['searchText' => $searchText,"idcat"=>$idcat,"idtel"=>$idtel,"idcol"=>$idcol,"idsuc"=>$idsuc,"idtal"=>$idtal,"precio"=>$precio,"nombreTalla"=>$nombreTalla])->links()); ?>


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
						
						<th>Desc</th>
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
						<td><span class="label label-success"><?php echo e($prod->desc."%"); ?></span> <?php echo e($prod->precio-($prod->precio*($prod->desc/100))); ?></td>
						
						<td>
								
							
							
						</td>
					</tr>
				
					<?php endforeach; ?>
				</table>
			</div>

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>