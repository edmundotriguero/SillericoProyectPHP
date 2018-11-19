{!!Form::open(array('url'=>'ventas','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}

<div class="row">

{{--<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			@foreach($sucursales as $suc)
			<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			@foreach($categorias as $cat)
			<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
			@endforeach
		</select>

	</div>
</div>--}}
<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
		<div class="input-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value=""></input>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>		
			</span>
		
		</div>
	</div>

</div>





{{ Form::close() }}




