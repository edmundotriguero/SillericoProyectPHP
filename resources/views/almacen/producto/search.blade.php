{!!Form::open(array('url'=>'almacen/producto','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}

<div class="row">

<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			@foreach($sucursales as $suc)
			<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			@foreach($categorias as $cat)
			<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idtal" id="idtal" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Talla</option>
			@foreach($tallas as $tal)
			<option value="{{$tal->idtalla}}">{{$tal->nombre}}</option>
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		<div class="form-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value="{{$searchText}}"></input>
			
		
		</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		<input type="text" class="form-control " name="precio" placeholder="Buscar precio" value=""></input>
		
	
	</div>
</div>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<div class="form-group text-center">
		
		<span class="input-group-btn">
			<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i> Buscar</button>		
		</span>
	
	</div>
</div>


</div>





{{ Form::close() }}




