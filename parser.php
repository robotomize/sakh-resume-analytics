<?php
include "db.php";
include "simpledom/simple_html_dom.php";
$firstArray[] = array();
for($counter=0;$counter<800;$counter++)
{
$html = file_get_html("http://rabota.sakh.com/resume/?list=".$counter);
for($i=0;$i<17;$i++)
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
foreach($html->find('nobr[class=green bold]') as $element)
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

$data = array(null,$firstArray[$counter][$i]["0"],$firstArray[$counter][$i]["1"],$firstArray[$counter][$i]["2"],$firstArray[$counter][$i]["3"],$firstArray[$counter][$i]["4"],$firstArray[$counter][$i]["5"],$firstArray[$counter][$i]["6"],$firstArray[$counter][$i]["7"],$firstArray[$counter][$i]["8"],$firstArray[$counter][$i]["9"]);
               try
                {
                    $STH = DBmodel::getInstance()->prepare("INSERT INTO main_data (id,name,type,resume_link,about,salary,sex,old,family,education,length_of_work) values (?,?,?,?,?,?,?,?,?,?,?)");
                    $STH->execute($data);
                }
                catch(PDOException $e)
                {
                   // file_put_contents('SQLerrors.txt', "Ошибка в методе вставки в базу".$e->getMessage(), FILE_APPEND);
                }



}


echo "Progress".round((($counter/800)*100))."%"."\n"; 
}
var_dump($firstArray);
