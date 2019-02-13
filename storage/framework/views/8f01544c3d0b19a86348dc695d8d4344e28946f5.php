<?php echo Form::open(array('url'=>'reportes/ventas','method'=>'GET','autocomplete'=>'on','role'=>'search')); ?>

<div class="panel panel-info">
<div class="panel-heading">
    <h3 class="panel-title">Parametros de reporte</h3>
  </div>
  <div class="panel-body">
    

  <div class="row">
<?php /*
<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			<?php foreach($sucursales as $suc): ?>
			<option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			<?php foreach($categorias as $cat): ?>
			<option value="<?php echo e($cat->idcategoria); ?>"><?php echo e($cat->nombre); ?></option>
			<?php endforeach; ?>
		</select>

	</div>
</div>*/ ?>
	<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
		<div class="form-group">
			<label>Fecha de inicio</label>
			<input type="date" class="form-control " name="fechaInicio"  value="<?php echo e(date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')))); ?>"></input>
			
		
		</div>
	</div>
	<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
		<div class="form-group">
			<label>Fecha de final</label>
			<input type="date" class="form-control " name="fechaFinal"  value="<?php echo e(date('Y-m-d')); ?>" ></input>
			
		</div>
	</div>

   
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
		<div class="form-group ">
				<button type="submit" class="btn btn-flat "><i class="fa fa-file-text-o"></i> Generar</button>		
		</div>
	</div>

</div>
	


  </div>

</div>








<?php echo e(Form::close()); ?>





