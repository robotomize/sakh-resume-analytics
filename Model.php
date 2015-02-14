<?php

include "db.php";
include "Math.php";
/**
*  // реализация простой модели
*/
class Model

{
// Выводим все данные с базы, для вставки в диаграммы
        public function getAllData()
        {
            $result = DBmodel::getInstance()->query("SELECT * FROM main_data");
            return $result->fetchAll();

        }

        public function getAvgSalary()
        {
                $result = DBmodel::getInstance()->query("SELECT type, AVG(salary) FROM main_data GROUP BY type");
                return $result->fetchAll();
        }

        public function getMaxSalaryByType()
        {
            $result = DBmodel::getInstance()->query("SELECT type, MAX(salary) FROM main_data GROUP BY type");
            return $result->fetchAll();
        }
        public function getMaxSalaryByOld()
        {
            $result = DBmodel::getInstance()->query("SELECT old, MAX(salary),name FROM main_data GROUP BY old");
            return $result->fetchAll();
        }
        public function getAvgSalaryByOld()
        {
        	 $result = DBmodel::getInstance()->query("SELECT old, AVG(salary),name FROM main_data GROUP BY old");
           return $result->fetchAll();
        }

        public function getAvgSalryFromAll()
        {
           $result = DBmodel::getInstance()->query("SELECT AVG(salary) FROM main_data");
           return $result->fetch();
        }

        public function getMaxSalryFromAll()
        {
           $result = DBmodel::getInstance()->query("SELECT MAX(salary),name FROM main_data");
           return $result->fetch();
        }

        public function __construct()
        {

        }
}
$objectStart = new Model();

$dataAvgSalaryByType = $objectStart->getAvgSalaryByOld();

$dataAvgSalaryFromAll = $objectStart->getAvgSalryFromAll();
$dataMaxSalaryFromAll = $objectStart->getMaxSalryFromAll();

$objectConvert = new Math(round($dataAvgSalaryFromAll["0"]),round($dataMaxSalaryFromAll["0"]));

?>
<html>
  <head>

  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
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
      <a class="navbar-brand" href="#">RA</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <!-- на будущее прогресс бары -->
    <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25000" aria-valuemin="0" aria-valuemax=<?php echo round($dataAvgSalaryFromAll["0"]); ?> style=<?php echo ProgressBarAvg(); ?>>
        <span class="sr-only">Зарплата относительно средней</span>
      </div>
    </div>

    <div class="progress">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="25000" aria-valuemin="0" aria-valuemax=<?php echo round($dataMaxSalaryFromAll["0"]); ?> style=<?php echo ProgressBarMax(); ?>>
          <span class="sr-only">Зарплата относительно максимальной</span>
        </div>
      </div>

		<center><div id="columnchart_values"></div></center>  

</div>

</html>
