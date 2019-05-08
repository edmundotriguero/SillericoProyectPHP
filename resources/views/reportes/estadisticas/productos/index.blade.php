@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Estadisticas  </h3> 
			{{-- @include('reportes.estadisticas.search') --}}
		</div>
	</div>
{{-- 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

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
        
				 ['prueba', 50],

        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Sucursal con mas ventas',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
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
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>
--}}


  <body>
      <div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
          <div class="form-group">
            
            <select name="idsuc" id="idsuc" class="form-control selectpicker"  data-live-search="true" >
                <option value="">Sucursal</option>
              @foreach($sucursales as $suc)
              <option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
              @endforeach
            </select>
        
          </div>
        </div>

    <!--Table and divs that hold the pie charts-->
    {{-- <table class="columns">
      <tr>
        <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table> --}}
  </body>


@push ('scripts')
<script>

  var aux;
    $(document).ready(function () {
        
		
    });

    $("#idsuc").change(function(){
       aux =  $("#idsuc").val();
      console.log(aux);
     });

    //  function getCountSucursal(id){
        


    //  }
	
   

</script>

@endpush

	

@endsection