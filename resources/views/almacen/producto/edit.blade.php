@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Producto: </h3>
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
{!!Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->idproducto]])!!}
{{Form::token()}}
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
			<label>Lote</label>
			<select name="idlote" class="form-control">
				@foreach ($lotes as $lote)
				@if ($lote->id==$producto->lote)
				<option value="{{$lote->id}}" selected>{{$lote->lote}}</option>
				@else
				<option value="{{$lote->id}}">{{$lote->lote}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Categoria</label>
			<select name="idcategoria" class="form-control">
				@foreach ($categoria as $cat)
				@if ($cat->idcategoria==$producto->idcategoria)
				<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
				@else
				<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Sucursal</label>
			<select name="idsucursal" class="form-control">
				@foreach ($sucursal as $suc)
				@if ($suc->idsucursales==$producto->idsucursal)
				<option value="{{$suc->idsucursales}}" selected>{{$suc->nombre}}</option>
				@else
				<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Sucursal</label>
			<input type="date" name="fechaCod" class="form-control" value="{{$producto->fechaCod}}"></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Codigo</label>
			<input type="text" name="codigo" class="form-control" value="{{$producto->codigo}}"
				readonly="readonly"></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Talla</label>
			<select name="idtalla" class="form-control">
				@foreach ($talla as $tal)
				@if ($tal->idtalla==$producto->idtalla)
				<option value="{{$tal->idtalla}}" selected>{{$tal->nombre}}</option>
				@else
				<option value="{{$tal->idtalla}}">{{$tal->nombre}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Tela</label>
			<select name="idtela" class="form-control">
				@foreach ($tela as $tel)
				@if ($tel->idtela==$producto->idtela)
				<option value="{{$tel->idtela}}" selected>{{$tel->nombre}}</option>
				@else
				<option value="{{$tel->idtela}}">{{$tel->nombre}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Color</label>
			<select name="idcolor" class="form-control">
				@foreach ($color as $col)
				@if ($col->idcolor==$producto->idcolor)
				<option value="{{$col->idcolor}}" selected>{{$col->nombre}}</option>
				@else
				<option value="{{$col->idcolor}}">{{$col->nombre}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Precio</label>
			<input type="number" name="precio" class="form-control" value="{{$producto->precio}}"></input>

		</div>
	</div>



</div>
<div class="row text-center">
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="submit">Cancelar</button>
		<a href="{{action('ProductoController@index')}}">
			<div class="btn btn-info">Volver</div>
		</a>
	</div>
</div>


{!!Form::close()!!}


@endsection