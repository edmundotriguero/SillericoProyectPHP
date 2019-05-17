@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Detalle venta: {{$venta->id}}</h3>
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
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="producto">Producto:</label>

			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Sucursal</th>
					<th>Categoria</th>
					<th>Color</th>
					<th>Talla</th>
					<th>Tela</th>
				</thead>
				@foreach ($productos as $producto)
				<tr>
					<td>{{ $producto->codigo}}</td>
					<td>{{ $producto->sucursal }}</td>
					<td>{{ $producto->categoria }}</td>
					<td>{{ $producto->color }}</td>
					<td>{{ $producto->talla }}</td>
					<td>{{ $producto->tela }}</td>
				</tr>
				@endforeach
				

			</table>
		</div>
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
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
		<div class="form-group">
			<label>Precio Venta</label>
			<input type="number" name="costoventa" class="form-control" value="{{$venta->costoVenta}}" readonly></input>

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
<h3>Detalles de Pago </h3>
@if (count($saldos) != 0)
<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<div class="table-responsive">
							<table id="" class="table table-striped table-bordered table-condensed table-hover ">
								<thead class="bg-blue-active">
									<th>id</th>
									<th>fecha</th>
									<th>tipoDoc</th>
									<th>numDoc</th>
									{{--<th>estado</th>--}}
									<th>ingreso</th>
								</thead>
								
								@php $sum = 0; @endphp
								@foreach ($saldos as $sal)
								<tfoot>
									<th>{{ $sal->id}}</th>
									<th>{{ date('d/m/Y', strtotime($sal->fecha))}}</th>
									@if ($sal->tipoDoc == 0 )
									<th>Factura</th>
									@elseif($sal->tipoDoc == 1)
									<th>Recibo</th>
									@else
									<th>Sin Doc </th>
									@endif
	
									<th>{{ $sal->numDoc}}</th>
									{{--<th>{{ $sal->estado}}</th>--}}
									<th>{{ $sal->ingreso}}</th>
									@php $sum = $sum + $sal->ingreso; @endphp
								</tfoot>
								@endforeach
								<tbody>
	
								</tbody>
							</table>
	
							<table id="" class="table table-striped table-bordered table-condensed table-hover ">
								<thead class="bg-blue-active">
	
									<th>Precio de Venta</th>
									<th>Pagado</th>
									<th>Por pagar</th>
								</thead>
	
								<tfoot>
	
									<th>{{$venta->costoVenta}}</th>
									<th>{{$sum}}</th>
									@php $saldoPorPagar = $venta->costoVenta - $sum ; @endphp
									<th>{{$saldoPorPagar}}</th>
								</tfoot>
	
							</table>
						</div>
					</div>
				</div>
	
			</div>
		</div>
	</div>
@else
<h5>Sin detalle de saldo</h5>

@endif




<div class="row text-center col-lg-12 col-sm-12 col-md-12 col-xs-10">
	<div class="form-group">

		<a href="{{action('VentasController@index')}}">
			<div class="btn btn-info">Volver</div>
		</a>
	</div>
</div>





@endsection