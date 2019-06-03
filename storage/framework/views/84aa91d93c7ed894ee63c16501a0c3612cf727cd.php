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
<br/>
<?php /* <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> */ ?>
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

<?php /* </div> */ ?>



<input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden" id="token"></input>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  var aux;
  var categoria;
  var categoria_mas_vendida;
  var i;
    $(document).ready(function () {
        
		
    });

    $("#idsuc").change(function(){
       aux =  $("#idsuc").val();
      console.log(aux);
      if(aux){
      getCountSucursal(aux);

      }
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
              categoria = res["categoria"];

              var dataChart = []
              $.each(categoria,function(i, v) {
              console.log("'"+v.nombre+"'" +  v.total  + ' \n' );
              dataChart.push([v.nombre, v.total ]);
              });
              console.log(dataChart);
              
              google.charts.load('current', {'packages':['corechart']});
             // Draw the pie chart for Sarah's pizza when Charts is loaded.
              google.charts.setOnLoadCallback(drawCategoriaMasVendidaChart);
              function drawCategoriaMasVendidaChart() {

              // Create the data table for Sarah's pizza.
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Topping');
                  data.addColumn('number', 'Slices');
                  data.addRows( dataChart );
                 


                  // Set options for Sarah's pie chart.
                  var options = {title:'categoria con mas ventas',
                                width:500,
                                height:300};

                  // Instantiate and draw the chart for Sarah's pizza.
                  var chart = new google.visualization.PieChart(document.getElementById('categoria_mas_vendida'));
                  chart.draw(data, options);
              }




              categoria_mas_vendida = res["categoria_mas_vendida"]
            //   $(res).each(function(key,value){
            //   datos.append("<tr class='fila'><td>"+(key+1)+"</td><td>"+value.lote+" - "+value.producto+" - "+value.categoria+"</td><td>"+value.sucursal+"</td></tr>")
            //  });
            }
          });


     }






 
</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>