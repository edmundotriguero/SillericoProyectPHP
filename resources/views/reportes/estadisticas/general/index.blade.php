@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <h3>Estadisticas generales </h3>
    {{-- @include('reportes.estadisticas.search') --}}
  </div>
</div>




  <!--Table and divs that hold the pie charts-->
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
  </table>
  </div>




@push ('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  // Load Charts and the corechart package.
 google.charts.load('current', {'packages':['corechart']});

// Draw the pie chart for Sarah's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawSarahChart);

// Draw the pie chart for the Anthony's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawAnthonyChart);

// Callback that draws the pie chart for Sarah's pizza.
function drawSarahChart() {

  // Create the data table for Sarah's pizza.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Slices');
  data.addRows([
   @foreach ($sucursal as $suc)
   ['{{$suc->nombre}}', {{$suc->total}}],
  @endforeach
  ]);

  // Set options for Sarah's pie chart.
  var options = {title:'Sucursal con mas ventas',
                 width:400,
                 height:300};

  // Instantiate and draw the chart for Sarah's pizza.
  var chart = new google.visualization.PieChart(document.getElementById('sucursal_con_mas_ventas'));
  chart.draw(data, options);
}

// Callback that draws the pie chart for Anthony's pizza.
function drawAnthonyChart() {

  // Create the data table for Anthony's pizza.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Slices');
  data.addRows([
   @foreach ($categoria as $cat)
   ['{{$cat->nombre}}', {{$cat->total}}],
  @endforeach
  ]);

  // Set options for Anthony's pie chart.
  var options = {title:'Productos con mas aparicion',
                 width:400,
                 height:300};

  // Instantiate and draw the chart for Anthony's pizza.
  var chart = new google.visualization.PieChart(document.getElementById('productos_con_mas_aparicion'));
  chart.draw(data, options);
}


</script>

@endpush


@endsection