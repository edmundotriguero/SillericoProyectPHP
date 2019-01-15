<?php echo Form::open(array('url'=>'almacen/movimiento','method'=>'GET','autocomplete'=>'on','role'=>'search')); ?>


<div class="row">




<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		<div class="form-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value="<?php echo e($searchText); ?>"></input>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i> Buscar</button>		
			</span>
		
		</div>
</div>




</div>





<?php echo e(Form::close()); ?>





