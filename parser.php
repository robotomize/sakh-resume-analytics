<?php
include "db.php";
include "simpledom/simple_html_dom.php";

/**
*   Класс парсинга sakh.com   
*/
class Parser 
{

	public function getResume()
	{

		$firstArray[] = array();
		for($counter=0;$counter<10;$counter++)
		{
		$html = file_get_html("http://rabota.sakh.com/resume/?list=".$counter);
		for($i=0;$i<16;$i++)
		{
		       $j = 0;
		      foreach($html->find('div a.vacancy') as $element)
		      {
		        if($j == $i)
		                {
		                        $firstArray[$counter][$i]["0"] = $element->plaintext; //job
		                        break;
		                }
		        else { $j++; }

		      }
			$j = 0;
			foreach($html->find('div a.companyLink') as $element)
			      {
			        if($j == $i)
			                {
			                        $firstArray[$counter][$i]["1"] = $element->plaintext; //type of job
			                        break;
			                }
			        else { $j++; }

			      }

			$j = 0;
			foreach($html->find('div a.vacancy') as $element)
			      {
			        if($j == $i)
			                {
			                       $linkArr = explode("&", $element->href);
			                       $firstArray[$counter][$i]["2"] = $linkArr["0"];  // vacantion link
			                        break;
			                }
			        else { $j++; }

			      }

			$j=0;
			foreach($html->find('p.vl_descr') as $element)
			      {
			        if($j == $i)
			                {
			                        $firstArray[$counter][$i]["3"] = $element->plaintext; //parameters
			                        $paramArr = explode(",", $element->plaintext);
			                        $oldDelim = explode(" ", $paramArr["1"]);
			                        $firstArray[$counter][$i]["5"] = $paramArr["0"]; // sex
			                        $firstArray[$counter][$i]["6"] = $oldDelim["1"]; // old
			                        $firstArray[$counter][$i]["7"] = $paramArr["2"]; // family
			                        $firstArray[$counter][$i]["8"] = $paramArr["3"]; // education
			                        $firstArray[$counter][$i]["9"] = $paramArr["4"]; // professional
			                        break;
			                }
			        else { $j++; }

			      }
			$j = 0;		
			foreach($html->find('td.salary') as $element)
			      {
			        if($j == $i)
			                {
			                        $salaryArr = explode(" ",$element->plaintext);
			                        $firstArray[$counter][$i]["4"] = $salaryArr["1"]; //salary
			                        break;
			                }
			        else { $j++; }

			      }
			//var_dump($firstArray);
			if($firstArray[$counter][$i]["4"] != "указана") // баг #1
			{
			  $data = array(null,$firstArray[$counter][$i]["0"],$firstArray[$counter][$i]["1"],$firstArray[$counter][$i]["2"],$firstArray[$counter][$i]["3"],$firstArray[$counter][$i]["4"],$firstArray[$counter][$i]["5"],$firstArray[$counter][$i]["6"],$firstArray[$counter][$i]["7"],$firstArray[$counter][$i]["8"],$firstArray[$counter][$i]["9"]);
			               try
			                {
			                    $STH = DBmodel::getInstance()->prepare("INSERT INTO main_data (id,name,type,resume_link,about,salary,sex,old,family,education,length_of_work) values (?,?,?,?,?,?,?,?,?,?,?)");
			                    $STH->execute($data);
			                }
			                catch(PDOException $e)
			                {
			                    file_put_contents('/var/www/Errors.txt', "Ошибка в методе для счетчика просмотров".$e->getMessage(), FILE_APPEND);
			                }
			}

		}

		echo "Loading.. ".round((($counter/10)*100))."%"."\n";

		}


	}

	public function getVacancy()
	{

		$firstArray[] = array();
		for($counter=0;$counter<10;$counter++)
		{
		$html = file_get_html("http://rabota.sakh.com/vacancy/?list=".$counter);
		for($i=0;$i<16;$i++)
		{
		       $j = 0;
		      foreach($html->find('td.title li.post a.') as $element)
		      {
		        if($j == $i)
		                {
		                     
		                		$emplDelim = explode("</a>", $element->innertext);
		                		$emplDelim = explode(">", $emplDelim["0"]);
		                		$firstArray[$counter][$i]["0"] = $emplDelim["1"]; // vacancy name
		                        break;
		                }
		        else { $j++; }

		      }
			$j = 0;
			foreach($html->find('td.title [li.info gray]') as $element)
			      {
			        if($j == $i)
			                {			                	
			                		//echo date("Y");			                	
			                		$typeOfJob = explode(date("Y"), $element->plaintext);
			                        $firstArray[$counter][$i]["1"] = $typeOfJob["1"];   //type of job

			                        if($typeOfJob["1"] == "")
			                        {			                        	
			                        	$typeOfJob = explode(date("Y")-1, $element->plaintext);
			                        	$firstArray[$counter][$i]["1"] = $typeOfJob["1"];   //type of job			                        	

			                        		if($typeOfJob["1"] == "")
						                        {						                        	
						                      		$typeOfJob = explode(date("Y")-2, $element->plaintext);
						                        	$firstArray[$counter][$i]["1"] = $typeOfJob["1"];   //type of job

						                        		if($typeOfJob["1"] == "")
									                        {									                        	
									                      		$typeOfJob = explode(date("Y")-3, $element->plaintext);
									                        	$firstArray[$counter][$i]["1"] = $typeOfJob["1"];   //type of job
									                      	}
						                      	}
			                        }		                      

			                        $firstArray[$counter][$i]["1"] = trim($firstArray[$counter][$i]["1"]);
			                        $firstArray[$counter][$i]["1"] = ucfirst(strtolower($firstArray[$counter][$i]["1"]));			                        		                       
			                        break;
			                }
			        else { $j++; }

			      }

			$j = 0;
			foreach($html->find('td.title li.company a') as $element)
			      {
			        if($j == $i)
			                {		
			                	   $divisionByQuestion = explode("?list", $element->href);                     
			                       $firstArray[$counter][$i]["2"] = $divisionByQuestion["0"];  // vacantion link
			                       break;
			                }
			        else { $j++; }

			      }
			
			$j = 0;		
			foreach($html->find('td.salary li') as $element)
			      {
			        if($j == $i)
			                {
			                        $salaryArr = explode(" ",$element->plaintext);
			                        if(isset($salaryArr["4"]))
			                        {
			                        	$firstArray[$counter][$i]["4"] = round(($salaryArr["1"]+$salaryArr["3"])/2);
			                        }
			                        else { $firstArray[$counter][$i]["4"] = $salaryArr["1"];   } //salary
			                        break;
			                }
			        else { $j++; }

			      }

			 $j = 0;		
			foreach($html->find('td.title li.company a') as $element)
			      {
			        if($j == $i)
			                {			                       
			                        $firstArray[$counter][$i]["5"] = $element->plaintext; //salary
			                        break;
			                }
			        else { $j++; }

			      }  
			$j = 0;		
			foreach($html->find('td.title li.post a') as $element)
			      {
			        if($j == $i*2)
			                {	
			                	$slashDelim = explode("/", $element->href);
			                	if($slashDelim["1"] == "vacancy")
			                	{		 
			                		$divisionByQuestion = explode("?list", $element->href);                        
			                        $firstArray[$counter][$i]["6"] = $divisionByQuestion["0"]; //salary
			                        break;
			                    }
			                }
			        else { $j++; }

			      }          
			
			if($firstArray[$counter][$i]["4"] != "указана") // баг #1
			{
				
					$data = array(null,$firstArray[$counter][$i]["0"],$firstArray[$counter][$i]["1"],$firstArray[$counter][$i]["4"],$firstArray[$counter][$i]["2"],$firstArray[$counter][$i]["5"],$firstArray[$counter][$i]["6"]);
			               try
			                {
			                    $STH = DBmodel::getInstance()->prepare("INSERT INTO main_data_vacancy (id,name,type,salary,resume_link,company,vacancy_link) values (?,?,?,?,?,?,?)");
			                    $STH->execute($data);
			                }
			                catch(PDOException $e)
			                {
			                    file_put_contents('/var/www/Errors.txt', "Ошибка в методе для счетчика просмотров".$e->getMessage(), FILE_APPEND);
			                }			               
			               			
			   
			}

		}	
		echo "Loading.. ".round((($counter/102)*140))."%"."\n";

		}

	}

	function __construct()
	{
		
	}
}

$fetchResume = new Parser();

while(true)
{	 
	$fetchResume->getVacancy();
	$fetchResume->getResume();	
	sleep(3600*5);
}




