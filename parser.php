<?php

include "simpledom/simple_html_dom.php";

$html = file_get_html("http://rabota.sakh.com/resume");
for($i=0;$i<17;$i++)
{
        $j = 0;
                foreach($html->find('div a.vacancy') as $element)
      {
        if($j == $i)
                {
                        $firstArray[$i]["0"] = $element->plaintext;
                        break;
                }
        else { $j++; }

      }
$j = 0;
foreach($html->find('div a.companyLink') as $element)
      {
        if($j == $i)
                {
                        $firstArray[$i]["1"] = $element->plaintext;
                        break;
                }
        else { $j++; }

      }
$j=0;
foreach($html->find('p.vl_descr') as $element)
      {
        if($j == $i)
                {
                        $firstArray[$i]["2"] = $element->plaintext;
                        break;
                }
        else { $j++; }

      }
$j = 0;
foreach($html->find('nobr[class=green bold]') as $element)
      {
        if($j == $i)
                {
                        $firstArray[$i]["3"] = $element->plaintext;
                        break;
                }
        else { $j++; }

      }
}
var_dump($firstArray);