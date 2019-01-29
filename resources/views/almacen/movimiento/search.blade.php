{!!Form::open(array('url'=>'almacen/movimiento','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<div class="input-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value="{{$searchText}}"></input>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i> Buscar</button>		
			</span>
		
		</div>
	</div>
{{ Form::close() }}




