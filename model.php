<?php

include "db.php";

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

        public function getMaxSalaryByGroup()
        {

        }
         public function getAvgSalaryByOld()
        {
        	 $result = DBmodel::getInstance()->query("SELECT old, AVG(salary),name FROM main_data GROUP BY old");

        return $result->fetchAll();
        }

        public function __construct()
        {

        }
}
$objectStart = new Model();
$dataAvgSalaryByType = $objectStart->getAvgSalaryByOld();
?>
<html>
  <head>
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
                        echo "['{$dataAvgSalaryByType[$counter][0]}', {$dataAvgSalaryByType[$counter][1]}],";                      
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

<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</html
