<?php

class Math
{

	static $avgValue = "";
	static $maxValue = "";

	public ProgressBarAvg(self::$avgValue)
	{		
		return round(round(25000/self::$avgValue)*100);
	}
	public ProgressBarMax(self::$maxValue)
	{
		return round(round(35000/self::$maxValue)*100);
	}
	public static function transformSalary($salary)
	{
	   return round(($salary / 1000))." ".($salary % 1000);
	 } 
	 public function __construct($param1,$param2)
        {
        	self::$avgValue = $param1;
        	self::$maxValue = $param2;
        }
        


}
