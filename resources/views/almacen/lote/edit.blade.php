@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar lote : {{$lote->lote}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($lote,['method'=>'PATCH','route'=>['almacen.lote.update',$lote->id]])!!}
            {{Form::token()}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="lote">Lote</label>
				<input type="text" name="lote" class="form-control" value="{{$lote->lote}}" placeholder="Lote"></input>
			</div>
			
			<div class="form-group">
				<label for="porcentaje_descuento">Porctaje de descuento</label>
				<input type="number" name="porcentaje_descuento" class="form-control" value="{{$lote->porcentaje_descuento}}" min="0" max="100"></input>
            </div>
        
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>


			{!!Form::close()!!}
		</div>
	</div>
	
@endsection