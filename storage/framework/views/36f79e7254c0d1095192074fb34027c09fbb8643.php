<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="error">
			<h3>Nuevos registros de productos</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
			

			<?php echo Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'on')); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidcategoria">Categoria</label>
						<select name="sidcategoria" id="sidcategoria" class="form-control selectpicker"  data-live-search="true">
							<?php foreach($categorias as $cat): ?>
							<option value="<?php echo e($cat->idcategoria); ?>"><?php echo e($cat->nombre); ?></option>
							<?php endforeach; ?>
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidsucursal">Sucursal</label>
						<select name="sidsucursal" id="sidsucursal" class="form-control selectpicker"  data-live-search="true">
							<?php foreach($sucursales as $suc): ?>
							<option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
							<?php endforeach; ?>
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sfechaCod">Fecha Cod</label>
						<input type="date" name="sfechaCod" id="sfechaCod" class="form-control" ></input>
					</div>
				</div>

			
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="scodigo">Codigo</label>
						<input type="text" name="scodigo" id="scodigo"  class="form-control" autocomplete="true" ></input>
					</div>
				</div>
			
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="stalla">Talla</label>
						<input type="text" name="stalla"  id="stalla" class="form-control" autocomplete="true" ></input>
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidtela">Tela</label>
						<select name="sidtela" id="sidtela" class="form-control selectpicker"  data-live-search="true">
							<?php foreach($telas as $t): ?>
							<option value="<?php echo e($t->idtela); ?>"><?php echo e($t->nombre); ?></option>
							<?php endforeach; ?>
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sprecio">Precio</label>
						<input type="number" name="sprecio" id="sprecio"  class="form-control" autocomplete="true" ></input>
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="scolor">Color</label>
						<input type="text" name="scolor"  id="scolor" class="form-control" autocomplete="true" ></input>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group text-center ">
							<label for="bt_add"></label>
						<button type="button" id="bt_add" class="btn btn-primary "><i class="fa fa-plus-square" aria-hidden="true"> Agregar</i></button>
					</div>
				</div>
			</div>		
		

	
<div class="row">
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
    <div class="panel panel-primary" >
        <div class="panel-body">
        
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="table-responsive">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
                    <thead class="bg-blue-active">
					<th>Nro</th>
                    <th>Opciones</th>
                    <th>Categoria</th>
					<th>Sucursal</th>
					<th>Codigo</th>
                    <th>Fecha Mod</th>
					<th>Talla</th>
					<th>Tela</th>
					<th>Color</th>
					<th>Precio</th>
					
                    </thead>
                    <tfoot>
					<th>TOTAL</th>
					<th></th>
                    <th></th>
                    <th></th>
                    <th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
                    <th><h4 id="total">Bs/. 0.00</h4></th>
                    </tfoot>
                    <tbody>

                    </tbody>

				</table>
				</div>
            </div>
		</div>
		
	</div>
	<div class="form-group text-center" id="guardar">
			<input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden"></input>
			<button class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
			<button class="btn btn-danger" type="reset"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
	</div>
</div>	
</div>
	<?php echo Form::close(); ?>


	<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function () {
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont = 1;
    total = 0;
    subtotal = [];

    $("#guardar").hide();

    function agregar(){
        idcategoria = $("#sidcategoria").val();
        categoria = $("#sidcategoria option:selected").text();
        idsucursal = $("#sidsucursal").val();
		sucursal = $("#sidsucursal option:selected").text();
		fechaCod = $("#sfechaCod").val();
		codigo = $("#scodigo").val();
		talla = $("#stalla").val();
		idtela = $("#sidtela").val();
		tela = $("#sidtela option:selected").text();
		precio = $("#sprecio").val();
		color = $("#scolor").val();
       
		

        if (codigo != "" && precio != "" ) {
            subtotal[cont]=(precio);
            total=total+subtotal[cont];

            precio = parseFloat(precio);
			
            var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idcategoria[]" value="'+idcategoria+'">'+categoria+'</td><td><input type="hidden" name="idsucursal[]" value="'+idsucursal+'">'+sucursal+'</td><td><input type="text" name="codigo[]" value="'+codigo+'"></td><td><input type="date" name="fechaCod[]" value="'+fechaCod+'"></td><td><input type="text" name="talla[]" value="'+talla+'"></td><td><input type="hidden" name="idtela[]" value="'+idtela+'">'+tela+'</td><td><input type="text" name="color[]" value="'+color+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td></tr>';
            cont++;
            limpiar();
            $("#total").html("Bs/.  "+total);
            evaluar();
            $('#detalles').append(fila);
        }
        else{
            alert("revice los datos por favor... \n El Codigo y el precio son campos obligatorios ");
        }

    }

    function limpiar() {

		numCodigo = 0;
		separador = "-";
		if(codigo.indexOf(separador)!= -1){
			aux = codigo.split(separador);
			numCodigo = parseInt(aux[1]);
			numCodigo = numCodigo + 1;
			codigoNuevo = aux[0]+'-'+numCodigo;
		}else{
			codigo = parseInt(codigo);
			codigoNuevo=codigo+1;
		}
		
        $("#scodigo").val(codigoNuevo);
        //$("#pprecio_compra").val("");
        //$("#pprecio_venta").val("");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        }
        else {
            $("#guardar").hide();
        }
    }
    
    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("Bs/.  "+total);
        $("#fila"+index).remove();
        evaluar();
    }

</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>