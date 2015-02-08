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
                                                $firstArray[$counter][$i]["0"] = $element->plaintext;
                                                break;
                                        }
                                        else { $j++; }
                        
                                }
                        $j = 0;
                        foreach($html->find('div a.companyLink') as $element)
                                 {
                                if($j == $i)
                                        {
                                                $firstArray[$counter][$i]["1"] = $element->plaintext;
                                                break;
                                        }
                                else { $j++; }
                        
                                  }
                        $j=0;
                        foreach($html->find('p.vl_descr') as $element)
                                {
                                if($j == $i)
                                        {
                                                $firstArray[$counter][$i]["2"] = $element->plaintext;
                                                break;
                                        }
                                else { $j++; }
                        
                                }
                        $j = 0;
                        foreach($html->find('nobr[class=green bold]') as $element)
                                {
                                if($j == $i)
                                        {
                                                $firstArray[$counter][$i]["3"] = $element->plaintext;
                                                break;
                                        }
                                else { $j++; }
                        
                                }
        
                        $data = array(null,$firstArray[$counter][$i]["0"],$firstArray[$counter][$i]["1"],$firstArray[$counter][$i]["2"],$firstArray[$counter][$i]["3"]);
                        try
                                {
                                    $STH = DBmodel::getInstance()->prepare("INSERT INTO main_data (id,name,type,about,salary) values (?,?,?,?,?)");
                                    $STH->execute($data);
                                }
                        catch(PDOException $e)
                                {
                                   // file_put_contents('/var/www/FeedBrother/PDOErrors.txt', "Ошибка в методе для счетчика просмотров".$e->getMessage(), FILE_APPEND);
                                }
        
        }
        echo "Progress".round((($counter/800)*100))."%"."\n";
        }
//var_dump($firstArray);

