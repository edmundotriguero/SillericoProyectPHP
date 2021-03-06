@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Asignar Descuento{{--$categoria->nombre--}}</h3>
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
	<div class="page-header">
		@if ($porcentaje == null)
			No tiene ningun descuento asignado
		@else
			<h4>Este lote ya tiene un descuento: 
				<span class="label label-success">
					{{$porcentaje->porcentaje." %"}}
				</span>	
			</h4>
		@endif
		<h4><small>* Para cambiar de valor solo guarde nuevamente con el nuevo porcentaje de descuento</small></h4>
		<h4><small>* Para eliminar un descuento deje vacío o guarde con "0". Esa acción no tiene retroceso.</small></h4>
		<small>*</small>
	</div>
	{!!Form::open(array('url'=>'almacen/producto/descStore','method'=>'POST','autocomplete'=>'on'))!!}
	{{Form::token()}}
		<div class="row">
			
			
		
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Lote</label>
				<input type="text" name="lote"   class="form-control" value="{{$lote->lote}}" readonly  ></input>

                </div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
				<div class="form-group">
					<label>Descuento</label>
				<input type="number" name="desc" min="0" max="100"  class="form-control" value=""  ></input>

                </div>
			</div>


			
		</div>
        <div class="row text-center">  
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="submit">Cancelar</button>
				<a href="{{action('ProductoController@index')}}"><div class="btn btn-info" >Volver</div></a>
			</div>
        </div>


			{!!Form::close()!!}
		
	
@endsection