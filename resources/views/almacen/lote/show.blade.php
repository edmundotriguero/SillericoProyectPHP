@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Detalles de Lote </h3>
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
			<label for="idproducto">ID: </label>
			<label for="idproducto">{{$lote->id}}</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="lote">LOTE: </label>
			<input type="text" class="form-control" value="{{$lote->lote}}" readonly>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="desc">DESCUENTO: </label>
			<input type="text" class="form-control" value="{{$lote->porcentaje_descuento}}" readonly>
		</div>
	</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	<h3 class="box-title">Productos encontrados: <span class="label label-info">{{count($productos)}}</span></h3>
	<div class="panel panel-primary">
		<div class="panel-body">

			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="table-responsive">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
						<thead class="bg-blue-active">
							@php
							$total_real = 0;
							$total_desc = 0;
							$desc = 0;
							@endphp
							<th>Categoria</th>
							<th>Sucursal</th>
							<th>Codigo</th>
							<th>Fecha Mod</th>
							<th>Talla</th>
							<th>Tela</th>
							<th>Color</th>
							<th>Precio Real</th>
							<th>Precio c/ descuento</th>
							{{-- etiqueta momentanea --}}
							<th>Opciones</th>
							{{-- fin --}}

						<tbody>
							@foreach ($productos as $prod)
							<tr>
								@php
								$desc = 0;
								$desc = $prod->precio - ($prod->precio * $lote->porcentaje_descuento / 100);
								$total_real += $prod->precio;
								$total_desc += $desc;
								@endphp
								<td>{{$prod->categoria}} </td>
								<td>{{$prod->sucursal}} </td>
								<td>{{$prod->codigo}} </td>
								<td>{{$prod->fechaCod}} </td>
								<td>{{$prod->talla}} </td>
								<td>{{$prod->tela}} </td>
								<td>{{$prod->color}} </td>
								<td>{{$prod->precio}} </td>
								<td>{{$desc}} </td>
								{{-- etiqueta momentanea --}}
								<td><a href="{{URL::action('ProductoController@edit',$prod->idproducto)}}"><button
											class="btn fa fa-refresh" aria-hidden="true"></button></a></td>
								{{-- fin --}}

							</tr>
							@endforeach

						</tbody>

						</thead>
						<tfoot>
							<th>TOTAL</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>
								<h4 id="total">Bs/. {{$total_real}}</h4>
							</th>

							<th>
								<h4 id="total">Bs/. {{$total_desc}}</h4>
							</th>
						</tfoot>

					</table>
				</div>
			</div>
		</div>
	</div>

</div>



<div class="row text-center">
	<div class="form-group">

		<a href="{{action('LoteController@index')}}">
			<div class="btn btn-info">Volver</div>
		</a>
	</div>
</div>





@endsection