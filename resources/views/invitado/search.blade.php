{!!Form::open(array('url'=>'invitado','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}

<div class="row"> 

<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true">
			<option value="">Sucursal</option>
			@foreach($sucursales as $suc)
			@if ($suc->idsucursales == $idsuc)
				<option value="{{$suc->idsucursales}}" selected>{{$suc->nombre}}</option>
			@else
				<option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
			@endif
			
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idcat" id="idcat" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Categoria</option>
			@foreach($categorias as $cat)
				@if ($cat->idcategoria == $idcat)
					<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}} </option>
				@else
					<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
				@endif
			
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		
		<select name="idtal" id="idtal" class="form-control selectpicker"  data-live-search="true" >
				<option value="">Talla</option>
			@foreach($tallas as $tal)
			@if ($tal->idtalla == $idtal)
				<option value="{{$tal->idtalla}}" selected>{{$tal->nombre}}</option>
				
			@else
				<option value="{{$tal->idtalla}}">{{$tal->nombre}}</option>
				
			@endif
			
			@endforeach
		</select>

	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		<div class="form-group">
			<input type="text" class="form-control " name="searchText" placeholder="Buscar codigo" value="{{$searchText}}"></input>
			
		
		</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<div class="form-group">
		<input type="text" class="form-control " name="precio" placeholder="Buscar precio" value="{{$precio}}"></input>
		
	
	</div>
</div>
<input type="hidden" id="nombreTalla" name="nombreTalla" value=""/>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<div class="form-group text-center">
		
		<span class="input-group-btn">
			<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i> Buscar</button>		
		</span>
	
	</div>
</div>
</div>
{{ Form::close() }}
@push ('scripts')
<script>


  
window.onload=function() {
			 
		talla = $("#idtal option:selected").text();
		if(talla == 'Talla'){
			talla = '';
		}
		console.log(talla);
		$("#nombreTalla").val(talla);

		}

		$("#idtal").change(function(){

            talla = $("#idtal option:selected").text();
			if(talla == 'Talla'){
			talla = '';
		}
			console.log(talla);
			$("#nombreTalla").val(talla);
	});
    

</script>

@endpush



