<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="error">
			<h3>Nuevos movimientos</h3>
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
			

			<?php echo Form::open(array('url'=>'almacen/movimiento','method'=>'POST','autocomplete'=>'on')); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
				<div class="col-lg-9 col-sm-9 col-md-9 col-xs-11">
					<div class="form-group">
						<label for="sidproducto">Producto</label>
						<select name="sidproducto" id="sidproducto" class="form-control selectpicker"  data-live-search="true">
								<option value="">Elige una opción</option>
							<?php foreach($productos as $prod): ?>
							<option value="<?php echo e($prod->idproducto); ?>"><?php echo e($prod->codigo." - ".$prod->categoria." - ".$prod->sucursal."-".$prod->idsuc); ?></option>
							<?php endforeach; ?>
						</select>
			
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
					<div class="form-group">
						<label for="sidsucursal">Sucursal Destino</label>
						<select name="sidsucursal" id="sidsucursal" class="form-control selectpicker"  data-live-search="true">
								<option value="">Elige una opción</option>
							<?php foreach($sucursales as $suc): ?>
							<option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
							<?php endforeach; ?>
						</select>
			
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
                    <th>Producto</th>
					<th>Sucursal Origen</th>
					<th>Sucursal Destino</th>
                    
					
                    </thead>
                    <tfoot>
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
    

    $("#guardar").hide();

    function agregar(){
        idproducto = $("#sidproducto").val();
		producto = $("#sidproducto option:selected").text();
		idSucDestino = $("#sidsucursal").val();
		sucursal = $("#sidsucursal option:selected").text();
		aux = producto.split("-");

		idSucOrigen = aux[3];
		

        if (idproducto != ""  ) {
			           
			
            var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+aux[0]+' - '+aux[1]+'</td><td><input type="hidden" name="idSucOrigen[]" value="'+idSucOrigen+'">'+aux[2]+'</td><td><input type="hidden" name="idSucDestino[]" value="'+idSucDestino+'">'+sucursal+'</td></tr>';
            cont++;
            limpiar();
            
            $("#guardar").show();
            $('#detalles').append(fila);
        }
        else{
            alert("Revice los datos por favor... \n El producto  y el destino son selecciones  obligatorias ");
        }

    }

    function limpiar() {

		//set a id producto a cero o nulo 
        //$("#s").val(codigoNuevo);
        $("#sidproducto").val("");
        
    }

    
    
    function eliminar(index){
       
        
        $("#fila"+index).remove();
        evaluar();
    }

</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>