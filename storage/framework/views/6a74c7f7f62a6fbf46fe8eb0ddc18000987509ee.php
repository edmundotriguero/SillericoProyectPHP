<?php $__env->startSection('contenido'); ?>
<div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <h3>Estadisticas </h3>
    <?php /* <?php echo $__env->make('reportes.estadisticas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
  </div>
</div>

<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
  <div class="form-group">

    <select name="idsuc" id="idsuc" class="form-control selectpicker" data-live-search="true">
      <option value="">Sucursal</option>
      <?php foreach($sucursales as $suc): ?>
      <option value="<?php echo e($suc->idsucursales); ?>"><?php echo e($suc->nombre); ?></option>
      <?php endforeach; ?>
    </select>

  </div>
</div>
<div class="table-responsive">
  <table class="columns">
    <tr>
      <td>
        <div id="sucursal_con_mas_ventas" style="border: 1px solid #ccc"></div>
      </td>
    </tr>
    <tr>
      <td>
        <div id="productos_con_mas_aparicion" style="border: 1px solid #ccc"></div>
      </td>
    </tr>
    <tr>
      <td>
        <div id="categoria_mas_vendida" style="border: 1px solid #ccc"></div>
      </td>
    </tr>
  </table>
</div>

<div id="graficos">

lugar de graficos

</div>
<input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden" id="token"></input>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  var aux;
    $(document).ready(function () {
        
		
    });

    $("#idsuc").change(function(){
       aux =  $("#idsuc").val();
      console.log(aux);
      getCountSucursal(aux);
     });

     function getCountSucursal(id){

          var datos = $("#datos");
          var route = "getCountSucursal";
          var idlote = id;
          var token = $("#token").val();

          $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data: {id: id},

            success: function(res){
              console.log(res);
            //   $(res).each(function(key,value){
            //   datos.append("<tr class='fila'><td>"+(key+1)+"</td><td>"+value.lote+" - "+value.producto+" - "+value.categoria+"</td><td>"+value.sucursal+"</td></tr>")
            //  });
            }
          });


     }

// finciones de graficado ****

 // Load Charts and the corechart package.
//  google.charts.load('current', {'packages':['corechart']});

// // Draw the pie chart for Sarah's pizza when Charts is loaded.
// google.charts.setOnLoadCallback(drawSarahChart);

// // Draw the pie chart for the Anthony's pizza when Charts is loaded.
// google.charts.setOnLoadCallback(drawAnthonyChart);

// google.charts.setOnLoadCallback(drawCategoriaMasVendidaChart);

// function drawCategoriaMasVendidaChart() {

// // Create the data table for Sarah's pizza.
// var data = new google.visualization.DataTable();
// data.addColumn('string', 'Topping');
// data.addColumn('number', 'Slices');
// data.addRows([
//  <?php foreach($categoria_mas_vendida as $c): ?>
//  ['<?php echo e($c->nombre); ?>', <?php echo e($c->total); ?>],
// <?php endforeach; ?>
// ]);

// // Set options for Sarah's pie chart.
// var options = {title:'categoria con mas ventas',
//                width:500,
//                height:300};

// // Instantiate and draw the chart for Sarah's pizza.
// var chart = new google.visualization.PieChart(document.getElementById('categoria_mas_vendida'));
// chart.draw(data, options);
// }

// // Callback that draws the pie chart for Sarah's pizza.
// function drawSarahChart() {

//   // Create the data table for Sarah's pizza.
//   var data = new google.visualization.DataTable();
//   data.addColumn('string', 'Topping');
//   data.addColumn('number', 'Slices');
//   data.addRows([
//    <?php foreach($sucursal as $suc): ?>
//    ['<?php echo e($suc->nombre); ?>', <?php echo e($suc->total); ?>],
//   <?php endforeach; ?>
//   ]);

//   // Set options for Sarah's pie chart.
//   var options = {title:'Sucursal con mas ventas',
//                  width:500,
//                  height:300};

//   // Instantiate and draw the chart for Sarah's pizza.
//   var chart = new google.visualization.PieChart(document.getElementById('sucursal_con_mas_ventas'));
//   chart.draw(data, options);
// }

// // Callback that draws the pie chart for Anthony's pizza.
// function drawAnthonyChart() {

//   // Create the data table for Anthony's pizza.
//   var data = new google.visualization.DataTable();
//   data.addColumn('string', 'Topping');
//   data.addColumn('number', 'Slices');
//   data.addRows([
//    <?php foreach($categoria as $cat): ?>
//    ['<?php echo e($cat->nombre); ?>', <?php echo e($cat->total); ?>],
//   <?php endforeach; ?>
//   ]);

//   // Set options for Anthony's pie chart.
//   var options = {title:'Productos con mas aparicion',
//                  width:500,
//                  height:300};

//   // Instantiate and draw the chart for Anthony's pizza.
//   var chart = new google.visualization.PieChart(document.getElementById('productos_con_mas_aparicion'));
//   chart.draw(data, options);
// }

</script>

<?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>