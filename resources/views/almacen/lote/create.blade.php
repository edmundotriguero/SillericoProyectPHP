@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Categoria </h3>
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'almacen/lote','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<label for="lote">Nombre de lote</label>
			<input type="text" name="lote" id="lote" class="form-control" placeholder="Nombre del lote"></input>
		</div>
		<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<label for="porcentaje_descuento">porcentaje de decuento</label>
			<input type="number" name="porcentaje_descuento" class="form-control" min="0" max="100"></input>
		</div>

		<div class="form-group text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
			<button class="btn btn-danger" type="reset"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
			<a href="{{action('LoteController@index')}}">
				<div class="btn btn-info"><i class="fa fa-reply-all" aria-hidden="true"></i></div>
			</a>
		</div>


		{!!Form::close()!!}
	</div>
</div>
@push ('scripts')
<script>
	var cont = 1;
		total = 0;
		subtotal = [];
		var xlote;
		var fecha = new Date();
		xlote = fecha.getDate()+""+(fecha.getMonth()+1)+""+fecha.getFullYear()+"_"+fecha.getHours()+""+fecha.getMinutes()+""+fecha.getSeconds();
		console.log(xlote);
		
		//console.log("Hora: "+fecha.getHours()+"\nMinuto: "+fecha.getMinutes()+"\nSegundo: "+fecha.getSeconds()+"\nMilisegundo: "+fecha.getMilliseconds());
		
		$('#lote').val(xlote);
	
		
	
</script>
@endpush
@endsection