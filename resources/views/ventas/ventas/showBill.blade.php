@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Detalle documento</h3>
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




<div class="row">
	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-10">
		<div class="form-group">
			<label>Cliente</label>
			<input type="text" name="cliente" class="form-control" value="{{$venta->cliente}}" readonly></input>

		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Fecha Venta</label>
			<input type="date" name="fechaVenta" class="form-control" value="{{$venta->fechaVenta}}" readonly></input>

		</div>
	</div>
	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-6">
		<div class="form-group">
			<label for="tipoDoc">Tipo Doc</label>
			<select name="tipoDoc" class="form-control selectpicker" readonly>
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
			<input type="text" name="numDoc" class="form-control" value="{{$venta->numDoc}}" readonly></input>

		</div>
	</div>

	

</div>
<br/>
<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="producto">Productos:</label>
	
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Sucursal</th>
						<th>Categoria</th>
						<th>Color</th>
						<th>Talla</th>
						<th>Tela</th>
						<th>Costo Venta</th>
						<th>Saldo</th>
						<th>Ingreso</th>
						<th>Ver Detalle</th>
					</thead>
					@php
						$totalVenta = 0;
						$totalSaldo = 0;
						$totalIngreso = 0;
					@endphp
					@foreach ($productos as $producto)
					<tr>
						<td>{{ $producto->codigo}}</td>
						<td>{{ $producto->sucursal }}</td>
						<td>{{ $producto->categoria }}</td>
						<td>{{ $producto->color }}</td>
						<td>{{ $producto->talla }}</td>
						<td>{{ $producto->tela }}</td>
						<td>{{ $producto->venta }}</td>
						<td>{{ $producto->saldo }}</td>
						<td>{{ $producto->ingreso }}</td>
						<td> 
							<a href="{{URL::action('VentasController@show',$producto->idventa)}}"><button class="btn fa fa-eye" aria-hidden="true"></button></a>
						</td>
					</tr>
					@php
						$totalVenta += $producto->venta;
						$totalSaldo += $producto->saldo;
						$totalIngreso += $producto->ingreso;
					@endphp
					@endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<th>TOTAL</th>
					<td>{{$totalVenta}}</td>
					<td>{{$totalSaldo}}</td>
					<td>{{$totalIngreso}}</td>
						<td></td>

					</tr>
	
				</table>
			</div>
		</div>
	</div>



<div class="row text-center col-lg-12 col-sm-12 col-md-12 col-xs-10">
	<div class="form-group">

		<a href="{{action('VentasController@index')}}">
			<div class="btn btn-info">Volver</div>
		</a>
	</div>
</div>





@endsection