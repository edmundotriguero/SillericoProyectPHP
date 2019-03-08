<?php echo Form::open(array('url'=>'almacen/producto','method'=>'GET','autocomplete'=>'on','role'=>'search')); ?>


<div class="row"> 

<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			<?php foreach($sucursal as $suc): ?>
			<?php if($suc->idsucursales == $idsuc): ?>
				<option value="<?php echo e($suc->idsucursales); ?>" selected><?php echo e($suc->nombre); ?></option>
			<?php else: ?>
				<option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
			<?php endif; ?>
			
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			<?php foreach($categorias as $cat): ?>
				<?php if($cat->idcategoria == $idcat): ?>
					<option value="<?php echo e($cat->idcategoria); ?>" selected><?php echo e($cat->nombre); ?> </option>
				<?php else: ?>
					<option value="<?php echo e($cat->idcategoria); ?>"><?php echo e($cat->nombre); ?></option>
				<?php endif; ?>
			
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idtal" id="idtal" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Talla</option>
			<?php foreach($tallas as $tal): ?>
			<?php if($tal->idtalla == $idtal): ?>
				<option value="<?php echo e($tal->idtalla); ?>" selected><?php echo e($tal->nombre); ?></option>
				
			<?php else: ?>
				<option value="<?php echo e($tal->idtalla); ?>"><?php echo e($tal->nombre); ?></option>
				
			<?php endif; ?>
			
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idtel" id="idtel" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Tela</option>
			<?php foreach($telas as $tel): ?>
			<?php if($tel->idtela == $idtel): ?>
				<option value="<?php echo e($tel->idtela); ?>" selected><?php echo e($tel->nombre); ?></option>
				
			<?php else: ?>
				<option value="<?php echo e($tel->idtela); ?>"><?php echo e($tel->nombre); ?></option>
				
			<?php endif; ?>
			
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idcol" id="idcol" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Color</option>
			<?php foreach($color as $col): ?>
			<?php if($col->idcolor == $idcol): ?>
				<option value="<?php echo e($col->idcolor); ?>" selected><?php echo e($col->nombre); ?></option>
				
			<?php else: ?>
				<option value="<?php echo e($col->idcolor); ?>"><?php echo e($col->nombre); ?></option>
				
			<?php endif; ?>
			
			<?php endforeach; ?>
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		<div class="form-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value="<?php echo e($searchText); ?>"></input>
			
		
		</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		<input type="text" class="form-control " name="precio" placeholder="Buscar precio" value="<?php echo e($precio); ?>"></input>
		
	
	</div>
</div>
<input type="hidden" id="nombreTalla" name="nombreTalla" value=""/>
<input type="hidden" id="nombreTela" name="nombreTela" value=""/>
<input type="hidden" id="nombreColor" name="nombreColor" value=""/>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<div class="form-group text-center">
		
		<span class="input-group-btn">
			<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i> Buscar</button>		
		</span>

			
	
	</div>
</div>
</div>
<?php echo e(Form::close()); ?>




<?php $__env->startPush('scripts'); ?>
<script>


  
window.onload=function() {
			 
		talla = $("#idtal option:selected").text();
		if(talla == 'Talla'){
			talla = '';
		}
		//=========
		console.log(talla);
		tela = $("#idtel option:selected").text();
		if (talla == 'Tela') {
			talla = '';
		}
		color = $("#idcol option:selected").text();
		if (color == 'Color') {
			color = '';
		}
		$("#nombreTalla").val(talla);
		$("#nombreTela").val(talla);
		$("#nombreColor").val(talla);
		}
		
		//==================
		$("#idtal").change(function(){

            talla = $("#idtal option:selected").text();
			if(talla == 'Talla'){
			talla = '';
		}
			console.log(talla);
			$("#nombreTalla").val(talla);
		});
		//==================
		$("#idtel").change(function(){

			tela = $("#idtel option:selected").text();
			if(tela == 'Tela'){
			tela = '';
			}
			console.log(tela);
		$("#nombreTela").val(tela);
		});
		//==================
		$("#idcol").change(function(){

			color = $("#idcol option:selected").text();
			if(color == 'Tela'){
			color = '';
			}
			console.log(color);
			$("#nombreColor").val(color);
		});
    

</script>

<?php $__env->stopPush(); ?>




