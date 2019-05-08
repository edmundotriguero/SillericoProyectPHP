@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{action('VentasController@index')}}"><div class="btn btn-info" ><i class="fa fa-reply-all" aria-hidden="true"></i></div></a>
		<h3>Editar Venta: {{--$categoria->nombre--}}</h3>
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
{!!Form::model($venta,['method'=>'PATCH','route'=>['ventas.ventas.update',$venta->id]])!!}
{{Form::token()}}

<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="producto">codigo: </label>
			<label for="producto">{{$producto->codigo}}</label>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Sucursal</th>
					<th>Categoria</th>
					<th>Color</th>
					<th>Talla</th>
					<th>Tela</th>
				</thead>

				<tr>
					<td>{{ $producto->codigo}}</td>
					<td>{{ $producto->sucursal }}</td>
					<td>{{ $producto->categoria }}</td>
					<td>{{ $producto->color }}</td>
					<td>{{ $producto->talla }}</td>
					<td>{{ $producto->tela }}</td>
				</tr>

			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-10">
		<div class="form-group">
			<label>Cliente</label>
			<input type="text" name="cliente" class="form-control" value="{{$venta->cliente}}"></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Fecha Venta</label>
			<input type="date" name="fechaVenta" class="form-control" value="{{$venta->fechaVenta}}"></input>

		</div>
	</div>
	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-6">
		<div class="form-group">
			<label for="tipoDoc">Tipo Doc</label>
			<select name="tipoDoc"  class="form-control selectpicker">
				@if ($venta->tipoDoc == 0)
				<option value="0" selected>Factura</option>
				@else
				<option value="1" selected>Recibo</option>
				@endif
				<option value="-">--</option>
				<option value="0">Factura</option>
				<option value="1">Recibo</option>
			</select>

		</div>
	</div>

	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-10">
		<div class="form-group">
			<label>Nun Doc.</label>
			<input type="text" name="numDoc" class="form-control" value="{{$venta->numDoc}}"></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Precio Venta</label>
			<input type="number" name="costoventa" class="form-control" value="{{$venta->costoVenta}}"></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Saldo</label>
			<input type="number" name="saldo" class="form-control" value="{{$venta->saldo}}" readonly></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Ingreso</label>
			<input type="number" name="ingreso" class="form-control" value="{{$venta->ingreso}}" readonly></input>

		</div>
	</div>



</div>
<div class="row text-center">
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="submit">Cancelar</button>
		
	</div>
</div>


{!!Form::close()!!}
@endsection