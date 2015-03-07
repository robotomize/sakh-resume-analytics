
<?php

require_once "model.php";

?>

<html>
  <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Аналитика резюме с sakh.com</title>
        <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> 
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>     
        <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
         <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/hover_pack.css" rel="stylesheet"> 
        <link href="assets/css/main.css" rel="stylesheet"> 


        <style>
            .headtext
            {
              color: #545454;
              font-family: 'Open Sans', sans-serif;
            }
            .navbar-custom
              {
                  background-color:#6f5499;
                  color:#ffffff;
                  border-radius:0;
              }

              .navbar-custom .navbar-nav > li > a
              { 
              	 color:#fff;               	 

              }  
              .navbar-custom .navbar-nav > li:hover { }         
              .navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus
               {
                  color: #000;
                  background-color:transparent;
              }
              .navbar-custom .navbar-brand
              { color:#eeeeee; }           
            .brandText
            {   }
            .brandText:hover  
            {  
            	color: #636363;
            	background-color: #000;
            }
            
                 
  			 a { color: #654D8A; }   
             a:hover { color: #654D8A; text-decoration: underline; }  

              .navbar-custom .navbar-nav > li:hover > a
              { 
              	 background-color: #000;              	 

              } 
              .statisticInfo
              {
                font-size: 3.8em;    
                color: #404040;       
              }
              .statisticSmallInfo
              {
                  font-size: 2.0em;
              } 
              .salaryBox
              {                 padding-top: 10px;
                padding-bottom: 10px;
                width: 43%;
              border-color: #000;
              border: 3px solid;          
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 5px;
                behavior: url(border-radius.htc); 
                color: #404040;  
              }
              .salaryBox:hover
              { 
                padding-top: 10px;
                padding-bottom: 10px;
                width: 43%;
              color: #fff; 
              background-color: #404040;   
              border-color: #000;
              border: 3px solid;          
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 5px;
                behavior: url(border-radius.htc);   
              }
        </style>  

  </head>
<nav class="navbar navbar-custom">
 

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">SakhResumeAnalyst</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="brandText listM"><a href="#columnchart_values">Главная</a></li>
        <li class="brandText listM"><a href="#columnchart_values_max_old">Максимальная зарплата по возрасту<span class="sr-only">(current)</span></a></li>        
        <li class="brandText listM"><a href="#donutchartAvgType">Средняя зарплата по роду специализации</a> <span class="sr-only">(current)</span></a></li>
        <li class="brandText listM"><a href="#donutchartMaxType">Максимальная зарплата по роду специализации</a> <span class="sr-only">(current)</span></a></li>

      </ul>

    </div>
 
</nav>

<div class="preloader"></div>
<div class="page-header">
  <center><h3 class="headtext">&nbsp;&nbsp;Аналитика резюме с сайта <a href="http://sakh.com" >Sakh.com</a> по зарплатным критериям</h3></center>
 <!--  <center> <h3 class="headtext">Проанализировано <?php /*echo $dataCountResume[0]; */?> резюме <?php /* echo "по состоянию на ".date("d.m.y");*/ ?></h3> </center> -->
</div>
 
<div class="container-fluid">    
   
     
      <div class="row">        
        <div class="col-md-4 col-lg-4">
          <center><h2 class="statisticInfo salaryBox"> <?php echo Math::transformSalary($dataCountResume["0"]); ?></h3>
          <small class="statisticSmallInfo">резюме проанализировано</small></center>
        </div>
        <div class="col-md-4 col-lg-4">
           <center><h2 class="statisticInfo salaryBox"> <?php echo Math::transformSalary($dataCountVacancy["0"]); ?></h3>
          <small class="statisticSmallInfo">вакансий проанализировано</small></center>
       </div>
        <div class="col-md-4 col-lg-4">
         <center><h2 class="statisticInfo salaryBox"> <?php  echo $dataCountType["0"] ?></h3>
          <small class="statisticSmallInfo">видов деятельности</small></center>          
        </div>
       <div>  
      
<br>
  <br>
    <br>

      <div class="row">        
        <div class="col-md-4 col-lg-4">
          <center><h2 class="statisticInfo salaryBox"> <?php echo Math::transformSalary(round($dataCountAvgSalaryFromResume["0"])); ?></h3>
          <small class="statisticSmallInfo">Средняя зарплата по резюме</small></center>
        </div>
        <div class="col-md-4 col-lg-4">
           <center><h2 class="statisticInfo salaryBox"> <?php echo Math::transformSalary(round($dataCountAvgSalaryFromVacancy["0"])); ?></h3>
          <small class="statisticSmallInfo">Средняя зарплата по вакансиям</small></center>
       </div>
        <div class="col-md-4 col-lg-4">         
          
        </div>

       </div>   
    

  <div class="row">
  <div class="col-md-12 col-lg-12">
   <div id="columnchart_values"></div>

  </div>
  </div>
<div class="row">
    <div class="col-md-12 col-lg-12">
   <div id="columnchart_values_max_old"></div>
    </div>
</div>

<div class="row">
<div class="col-md-12 col-lg-12">
<div id="columnchart_values1"></div>
</div>
</div>

<div class="row">
<div class="col-md-12 col-lg-12">
<div id="donutchartAvgType"></div>
</div>
</div>

<div class="row">
<div class="col-md-12 col-lg-12">
<div id="donutchartMaxType"></div>
</div>
</div>

</div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <center><p><a href="#columnchart_values"><h2><b>В начало</b></h2></a></p>	</center><br><br>
            </div>
        </div>
<div id="footermain">
		
			<div class="row">
				
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 footerhop">
					
				<p><font class="headertext1">&nbsp;&nbsp;<b>Sakh.com Resume Analyst</b></font></p>
                			
		

				</div>			
			
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 footerhop">
					<center>
				<p align="left"><font class="newfootertextbrandd"><u>Найти в социальных сетях </u></font></p>			
				<p align="left"><a href="http://vk.com/id6139701"><font class="newfootertextbrandd">Вконтакте</font></a></p>
				

			</center>
				</div>
				
				
				<div class="col-lg-3">
					
				</div>
				
			
				<div class="col-lg-3">
					
				</div>
				
				
			</div>
	
	</div>


  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
      <script src="assets/js/pace.js"></script> 
    <script type="text/javascript">
  $('select').select2();
</script>
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
                        $dataAvgSalaryByType[$counter][1] =  round((round($dataAvgSalaryByType[$counter][1])+round($dataAvgSalaryByType[$counter+1][1]))/2);
                        echo "['{$dataAvgSalaryByType[$counter][0]}', {$dataAvgSalaryByType[$counter][1]},'stroke-color: #703593; stroke-width: 6; fill-color: #C5A5CF'],";
                        $counter = $counter + 2;
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
         width: "50%",
        height: "720",
        bar: {groupWidth: "87%"},
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
                        $dataMaxSalaryByOld[$counter][1] = round((round($dataMaxSalaryByOld[$counter][1])+round($dataMaxSalaryByOld[$counter+1][1]))/2);
                        echo "['{$dataMaxSalaryByOld[$counter][0]}', {$dataMaxSalaryByOld[$counter][1]},'stroke-color: #871B47; stroke-opacity: 0.8; stroke-width: 6; fill-color: #BC5679; fill-opacity: 0.2'],";
                        $counter = $counter +2;
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
        bar: {groupWidth: "90%"},
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

 <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Количество", "Зарплата", { role: "style" } ],

         <?php
             $counter = 0;
             while($counter<count($dataGroupSalaryByCount))
                {                       
                        echo "['{$dataGroupSalaryByCount[$counter][0]}',".intval($dataGroupSalaryByCount[$counter][1]).",'stroke-color: #5E2182; stroke-width: 4; fill-color: #7448C2'],";
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
        title: "Группировка количества людей по зарплате",
         width: "100%",
        height: "720",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      chart.draw(view, options);
  }
  </script>


</html>

