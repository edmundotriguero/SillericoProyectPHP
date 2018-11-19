<?php echo Form::open(array('url'=>'invitado','method'=>'GET','autocomplete'=>'on','role'=>'search')); ?>


<div class="row">

<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			<?php foreach($sucursales as $suc): ?>
			<option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			<?php foreach($categorias as $cat): ?>
			<option value="<?php echo e($cat->idcategoria); ?>"><?php echo e($cat->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idtal" id="idtal" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Talla</option>
			<?php foreach($tallas as $tal): ?>
			<option value="<?php echo e($tal->idtalla); ?>"><?php echo e($tal->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		<div class="input-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value="<?php echo e($searchText); ?>"></input>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>		
			</span>
		
		</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="input-group">
		<input type="text" class="form-control " name="precio" placeholder="Buscar precio" value=""></input>
		<span class="input-group-btn">
			<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>		
		</span>
	
	</div>
</div>


</div>





<?php echo e(Form::close()); ?>





