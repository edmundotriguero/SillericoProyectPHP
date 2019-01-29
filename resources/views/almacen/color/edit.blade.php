@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Color: {{$color->nombre}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($color,['method'=>'PATCH','route'=>['almacen.color.update',$color->idcolor]])!!}
            {{Form::token()}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$color->nombre}}" placeholder="Nombre"></input>
            </div>
        
			<div class="form-group text-center">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
				<a href="{{action('ColorController@index')}}"><div class="btn btn-info" >Volver</div></a>
			</div>


			{!!Form::close()!!}
		</div>
	</div>
	
@endsection