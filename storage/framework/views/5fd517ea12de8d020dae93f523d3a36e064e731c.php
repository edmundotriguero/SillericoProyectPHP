<?php echo Form::open(array('url'=>'ventas/indexSaldo','method'=>'GET','autocomplete'=>'on','role'=>'search')); ?>


<div class="row">

<?php /*<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			<?php foreach($sucursales as $suc): ?>
			<option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			<?php foreach($categorias as $cat): ?>
			<option value="<?php echo e($cat->idcategoria); ?>"><?php echo e($cat->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>*/ ?>
<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
		<div class="input-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar documento" value=""></input>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>		
			</span>
		
		</div>
	</div>

</div>





<?php echo e(Form::close()); ?>





