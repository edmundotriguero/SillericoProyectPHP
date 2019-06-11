@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <h3>Estadisticas </h3>
    {{-- @include('reportes.estadisticas.search') --}}
  </div>
</div>

<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
  <div class="form-group">

    <select name="idsuc" id="idsuc" class="form-control selectpicker" data-live-search="true">
      <option value="">Sucursal</option>
      @foreach($sucursales as $suc)
      <option value="{{$suc->idsucursales}}">{{$suc->nombre}}</option>
      @endforeach
    </select>

  </div>
</div>
<br />
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="table-responsive">
  <table class="columns">
    
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

</div>



<input name="_token" value="{{ csrf_token() }}" type="hidden" id="token"></input>

@push ('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  var aux;
  var categoria;
  var categoria_mas_vendida;
  var i;

  var dataChart = [];
  var dataChart2 = [];

  // ***** llamadas a google chart *****
  google.charts.load('current', {'packages':['corechart']});



  // ***** fin llamadas a google chart *****

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
              categoria_mas_vendida = res["categoria_mas_vendida"];

              
              // se llena el rray para garficar 
              $.each(categoria,function(i, v) {
                // console.log("'"+v.nombre+"'" +  v.total  + ' \n' );
                dataChart.push([v.nombre, v.total ]);
              });

              $.each(categoria_mas_vendida,function(i, c) {
                dataChart2.push([c.nombre, c.total ]);
              });
              // console.log(dataChart);
              
              
             // Draw the pie chart for Sarah's pizza when Charts is loaded.
              google.charts.setOnLoadCallback(drawCategoriaConMasAparicionChart);
              google.charts.setOnLoadCallback(drawCategoriaMasVendidaChart);

              function drawCategoriaConMasAparicionChart() {

              // Create the data table for Sarah's pizza.
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Topping');
                  data.addColumn('number', 'Slices');
                  data.addRows( dataChart );
                 
                  // Set options for Sarah's pie chart.
                  var options = {title:'cantidad de productos',
                                width:500,
                                height:350};

                  // Instantiate and draw the chart for Sarah's pizza.
                  var chart = new google.visualization.PieChart(document.getElementById('productos_con_mas_aparicion'));
                  chart.draw(data, options);
              }

              function drawCategoriaMasVendidaChart() {

              // Create the data table for Sarah's pizza.
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Topping');
                  data.addColumn('number', 'Slices');
                  data.addRows( dataChart2 );
                
                  // Set options for Sarah's pie chart.
                  var options = {title:'producto con mas ventas',
                                width:500,
                                height:300};

                  // Instantiate and draw the chart for Sarah's pizza.
                  var chart = new google.visualization.PieChart(document.getElementById('categoria_mas_vendida'));
                  chart.draw(data, options);
              }




              
            }

          });

          dataChart = [];
          dataChart2 = [];
     }






 
</script>

@endpush
@endsection