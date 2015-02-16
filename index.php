<?php

require_once "model.php";

$objectStart = new Model();

$dataAvgSalaryByType = $objectStart->getAvgSalaryByOld();
$dataMaxSalaryByOld = $objectStart->getMaxSalaryByOld();

$dataAvgSalaryFromType = $objectStart->getAvgSalary();
$dataMaxSalaryFromType = $objectStart->getMaxSalaryByType();

$dataAvgSalaryFromAll = $objectStart->getAvgSalryFromAll();
$dataMaxSalaryFromAll = $objectStart->getMaxSalryFromAll();
$dataByTypeFromSalary = $objectStart->getDataByTypeFromSalary();

$objectConvert = new Math(round($dataAvgSalaryFromAll["0"]),round($dataMaxSalaryFromAll["0"]));

?>
<html>
  <head>

        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" />


        <style>
            .headtext
            {
              color: #8D8D8D;
              font-family: 'Open Sans', sans-serif;
            }
        </style>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
    <script type="text/javascript">

      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Возраст", "Зарплата", { role: "style" }],
          <?php
                $counter = 0;
                while($counter<count($dataAvgSalaryByType))
                {
                        $dataAvgSalaryByType[$counter][1] = round($dataAvgSalaryByType[$counter][1]);
                        echo "['{$dataAvgSalaryByType[$counter][0]}', {$dataAvgSalaryByType[$counter][1]},'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],";
                        $counter++;
                }
          ?>
        ]);

       var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "График зависимости средней зарплаты от возраста",
         width: "100%",
        height: "720",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

 <script type="text/javascript">

      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Возраст", "Зарплата", { role: "style" }],
          <?php
                $counter = 0;
                while($counter<count($dataMaxSalaryByOld))
                {
                        $dataMaxSalaryByOld[$counter][1] = round($dataMaxSalaryByOld[$counter][1]);
                        echo "['{$dataMaxSalaryByOld[$counter][0]}', {$dataMaxSalaryByOld[$counter][1]},'stroke-color: #871B47; stroke-opacity: 0.8; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2'],";
                        $counter++;
                }
          ?>
        ]);

       var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "График зависимости максимальной зарплаты от возраста",
        width: "100%",
        height: "720",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values_max_old"));
      chart.draw(view, options);
  }
  </script>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Тип деятельности', 'Зарплата'],
           <?php
                $counter = 0;
                while($counter<count($dataAvgSalaryFromType))
                {
                        $dataAvgSalaryFromType[$counter][1] = round($dataAvgSalaryFromType[$counter][1]);
                        echo "['{$dataAvgSalaryFromType[$counter][0]}', {$dataAvgSalaryFromType[$counter][1]}],";
                        $counter++;
                }
          ?>
        ]);

        var options = {
          title: 'Зависимость среднего значения зарплаты от вида деятельности',
          pieHole: 0.4,
            width: "100%",
             height: "720",
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartAvgType'));
        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Тип деятельности', 'Зарплата'],
           <?php
                $counter = 0;
                while($counter<count($dataMaxSalaryFromType))
                {
                        $dataMaxSalaryFromType[$counter][1] = round($dataMaxSalaryFromType[$counter][1]);
                        echo "['{$dataMaxSalaryFromType[$counter][0]}', {$dataMaxSalaryFromType[$counter][1]}],";
                        $counter++;
                }
          ?>
        ]);

        var options = {
          title: 'Зависимость максимального значения зарплаты от вида деятельности',
          pieHole: 0.4,
            width: "100%",
        height: "720",
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartMaxType'));
        chart.draw(data, options);
      }
    </script>


  </head>
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ResumeAnalyst</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Главная <span class="sr-only">(current)</span></a></li>
          
      </ul>

    </div>
  </div>
</nav>


<div class="page-header">
  <h3 class="headtext">&nbsp;&nbsp;Аналитика резюме с сайта <a href="http://sakh.com">Sakh.com</a> по зарплатным критериям<small>Последнее обнволение на 14.02.2015</small></h3>
  <div class="row">
    <center><div class="col-md-3">
    <select class="js-example-basic-single">
    <?php
                $counter = 0;
                while($counter<count($dataByTypeFromSalary))
                {                        
                        echo "<option value=AL>$dataByTypeFromSalary[$counter]</option>";
                        $counter++;
                }
    ?>       
    </select>
    </div>
    </center>
  </div>
</div>
<div class="container-fluid">

  <div class="row">
  <div class="col-md-12">
   <div id="columnchart_values"></div>

  </div>
  </div>
<div class="row">
    <div class="col-md-12">
   <div id="columnchart_values_max_old"></div>
    </div>
</div>
<div class="row">
<div class="col-md-12">
<div id="donutchartAvgType"></div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div id="donutchartMaxType"></div>
</div>
</div>


<!--
       <div><strong>Зарплата относительно средней(<?php /* echo round($dataAvgSalaryFromAll["0"]); */?>)</strong></div><br>
    <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25000" aria-valuemin="0" aria-valuemax=<?php /*echo round($dataAvgSalaryFromAll["0"]); */?> style=<?php /*echo $objectConvert->ProgressBarAvg(); */?>>

      </div>
    </div> -->
    <!-- на будущее прогресс бары -->
<!--
<div><strong>Зарплата относительно максимальной(<?php /* echo round($dataMaxSalaryFromAll["0"]); */?>)</strong></div><br>
    <div class="progress">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="25000" aria-valuemin="0" aria-valuemax=<?php /*echo round($dataMaxSalaryFromAll["0"]); */?> style=<?php /*echo $objectConvert->ProgressBarMax(); */?>>

        </div>
      </div>
-->
</div>

<script type="text/javascript">
  $('select').select2();
</script>

</html>
