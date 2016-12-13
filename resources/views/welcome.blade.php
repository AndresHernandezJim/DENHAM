<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
            }
            .wrap{
                width: 100%;
                margin: 0 auto;
              }
              .leftrigth{
                height: 100vh;
              }
              .rigthleft{
                height: 100vh;
              }
              .top{
                height: 33.3vh;
              }
            .mid{
                height: 33.3vh;
            }
              .bott{
                height: 33.3vh;
              }
              .center{
                height: 100vh;
              }
        </style>
    </head>
    <body>
       <div class="wrap">
        <div class="row">
           <div class="leftrigth col s4">
               <div class="top" id="uno"></div>
               <div class="mid" id="dos"></div>
               <div class="bott" id="tres"></div>
           </div>
            <div class="center col s4">
                <div class="top" id="cuatro"></div>
                <div class="mid" id="cinco"></div>
                <div class="bott" id="seis"></div>   
           </div>
           <div class="rigthleft col s4">
                <div class="top" id="siete"></div>
                <div class="mid" id="ocho"></div>
                <div class="bott" id="nueve"></div>
           </div>
        </div>
       </div>
       <script src="/js/materialize.min.js"></script>
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(uno);
      google.charts.setOnLoadCallback(dos);
      google.charts.setOnLoadCallback(seis);
      google.charts.setOnLoadCallback(cinco);
      google.charts.setOnLoadCallback(tres);
      google.charts.setOnLoadCallback(cuatro);
      // Callback that draws the pie chart for Sarah's pizza.
      function cuatro(){
         var data = google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
          ['Acrocanthosaurus (top-spined lizard)', 12.2],
          ['Albertosaurus (Alberta lizard)', 9.1],
          ['Allosaurus (other lizard)', 12.2],
          ['Apatosaurus (deceptive lizard)', 22.9],
          ['Archaeopteryx (ancient wing)', 0.9],
          ['Argentinosaurus (Argentina lizard)', 36.6],
          ['Baryonyx (heavy claws)', 9.1],
          ['Brachiosaurus (arm lizard)', 30.5],
          ['Ceratosaurus (horned lizard)', 6.1],
          ['Coelophysis (hollow form)', 2.7],
          ['Compsognathus (elegant jaw)', 0.9],
          ['Deinonychus (terrible claw)', 2.7],
          ['Diplodocus (double beam)', 27.1],
          ['Dromicelomimus (emu mimic)', 3.4],
          ['Gallimimus (fowl mimic)', 5.5],
          ['Mamenchisaurus (Mamenchi lizard)', 21.0],
          ['Megalosaurus (big lizard)', 7.9],
          ['Microvenator (small hunter)', 1.2],
          ['Ornithomimus (bird mimic)', 4.6],
          ['Oviraptor (egg robber)', 1.5],
          ['Plateosaurus (flat lizard)', 7.9],
          ['Sauronithoides (narrow-clawed lizard)', 2.0],
          ['Seismosaurus (tremor lizard)', 45.7],
          ['Spinosaurus (spiny lizard)', 12.2],
          ['Supersaurus (super lizard)', 30.5],
          ['Tyrannosaurus (tyrant lizard)', 15.2],
          ['Ultrasaurus (ultra lizard)', 30.5],
          ['Velociraptor (swift robber)', 1.8]]);

        var options = {
          title: 'Lengths of dinosaurs, in meters',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('cuatro'));
        chart.draw(data, options);
      }
      function uno() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          @foreach( $uno as $item )
          ['{{$item->Cliente}}', {{$item->precio}}],
          @endforeach
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Los 10 Mayores Compradores',
                       width:350,
                       height:300};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('uno'));
        chart.draw(data, options);
      }
      function dos(){
          var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 350,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
              var chart = new google.visualization.ColumnChart(document.getElementById("tres"));
              chart.draw(view, options);
      }
      function cinco(){
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales', 'Expenses'],
              ['2004',  1000,      400],
              ['2005',  1170,      460],
              ['2006',  660,       1120],
              ['2007',  1030,      540]
            ]);

            var options = {
              title: 'Company Performance',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('dos'));
            chart.draw(data, options);
      }
      function seis() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 2],
          ['Onions', 2],
          ['Olives', 2],
          ['Zucchini', 0],
          ['Pepperoni', 3]
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'How Much Pizza Anthony Ate Last Night',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('ocho'));
        chart.draw(data, options);
      }
      function tres(){
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'x');
        data.addColumn('number', 'values');
        data.addColumn({id:'i0', type:'number', role:'interval'});
        data.addColumn({id:'i1', type:'number', role:'interval'});
        data.addColumn({id:'i2', type:'number', role:'interval'});
        data.addColumn({id:'i2', type:'number', role:'interval'});
        data.addColumn({id:'i2', type:'number', role:'interval'});
        data.addColumn({id:'i2', type:'number', role:'interval'});
  
        data.addRows([
            [1, 100, 90, 110, 85, 96, 104, 120],
            [2, 120, 95, 130, 90, 113, 124, 140],
            [3, 130, 105, 140, 100, 117, 133, 139],
            [4, 90, 85, 95, 85, 88, 92, 95],
            [5, 70, 74, 63, 67, 69, 70, 72],
            [6, 30, 39, 22, 21, 28, 34, 40],
            [7, 80, 77, 83, 70, 77, 85, 90],
            [8, 100, 90, 110, 85, 95, 102, 110]]);
  
        // The intervals data as narrow lines (useful for showing raw source data)
        var options_lines = {
            title: 'Line intervals, default',
            curveType: 'function',
            lineWidth: 4,
            intervals: { 'style':'line' },
            legend: 'none'
        };
  
        var chart_lines = new google.visualization.LineChart(document.getElementById('cinco'));
        chart_lines.draw(data, options_lines);
      }
    </script>
    </body>
</html>
