@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Producto con codigo:  {{$producto->codigo}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	@php
		$aux = 'sin descuento';
		$aux2 = $producto->precio;
	@endphp
	@foreach ($desc as $d)
		@if ($d->lote == $producto->lote )
			{{-- <td><span class="label label-success">{{$d->porcentaje."%"}}</span> {{$producto->precio-($producto->precio*($d->porcentaje/100))}}</td> --}}
			@php
				$aux2 = $producto->precio-($producto->precio*($d->porcentaje/100));
				$aux = $d->porcentaje."%";
			@endphp
			
		@endif
	@endforeach
	{{-- @foreach ($desc as $d)
			@if ($d->lote == $producto->lote )
				{{$d->porcentaje."%".$prod->precio-($prod->precio*($d->porcentaje/100))}}<
					
			@endif
	@endforeach --}}
	<div class="alert alert-info" role="alert"><h4>DESCUENTO:  <span class="label label-warning" >{{$aux}}</span> Precio con descuento: <span class="label label-success"> {{$aux2}}</span></h4></div>
	<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				 <div class="form-group">
					 <label for="idproducto">ID: </label>
					 <label for="idproducto">{{$producto->idproducto}}</label>
				 </div>
			 </div>	
	</div>
	<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				 <div class="form-group">
					 <label for="idproducto">LOTE: </label>
					 <input type="text"    class="form-control" value="{{$producto->lote}}" readonly >
				 </div>
			 </div>	
		 </div>
			
		<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Categoria: </label>
					<input type="text"    class="form-control" value="{{$producto->categoria}}" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Sucursal</label>
					<input type="text"    class="form-control" value="{{$producto->sucursal}}" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>fecha codificacion</label>
				<input type="date" name="fechaCod"   class="form-control" value="{{$producto->fechaCod}}" readonly>

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Codigo</label>
				<input type="text" name="codigo"   class="form-control" value="{{$producto->codigo}}" readonly="readonly" >

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Talla</label>
					<input type="text"    class="form-control" value="{{$producto->talla}}" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Tela</label>
					<input type="text"    class="form-control" value="{{$producto->tela}}" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Color</label>
					<input type="text"    class="form-control" value="{{$producto->color}}" readonly >
                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Precio</label>
				<input type="number" name="precio"   class="form-control" value="{{$producto->precio}}" readonly ></input>

                </div>
			</div>


			
		</div>
        <div class="row text-center">  
			<div class="form-group">
				
				<a href="{{action('ProductoController@index')}}"><div class="btn btn-info" >Volver</div></a>
			</div>
        </div>


			
		
	
@endsection