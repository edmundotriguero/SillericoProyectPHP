{!!Form::open(array('url'=>'almacen/tela','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}


<div class="input-group">
	<input type="text" class="form-control" name="searchText" placeholder="Buscar" value="{{$searchText}}"></input>
	<span class="input-group-btn">
		<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>		
	</span>
</div>


{{ Form::close() }}




