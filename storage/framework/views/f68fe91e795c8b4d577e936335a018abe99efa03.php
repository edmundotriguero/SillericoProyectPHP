<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Reporte de Ventas  </h3> 
			<?php echo $__env->make('reportes.estadisticas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart2);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart2() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
			<?php foreach($categoria as $cat): ?>
				 ['<?php echo e($cat->nombre); ?>', <?php echo e($cat->total); ?>],
			<?php endforeach; ?>
         
          
        ]);

        // Set chart options
        var options = {'title':'Cantidad de productos por categoria',
                       'width':500,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>	

<?php foreach($categoria as $cat): ?>
				 <?php echo e($cat->nombre); ?>, <?php echo e($cat->total); ?>

<?php endforeach; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>