
<?php

require_once "db.php";
require_once "math.php";

/**
*  // базовая модель
*/
class Model

{
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
            $result = DBmodel::getInstance()->query("SELECT old, MAX(salary) FROM main_data GROUP BY old");
            return $result->fetchAll();
        }
        public function getAvgSalaryByOld()
        {
           $result = DBmodel::getInstance()->query("SELECT old, AVG(salary) FROM main_data GROUP BY old");
           return $result->fetchAll();
        }

        public function getAvgSalryFromAll()
        {
           $result = DBmodel::getInstance()->query("SELECT AVG(salary) FROM main_data");
           return $result->fetch();
        }

        public function getMaxSalryFromAll()
        {
           $result = DBmodel::getInstance()->query("SELECT MAX(salary) FROM main_data");
           return $result->fetch();
        }

        public function getDataByTypeFromSalary()
        {
          $result = DBmodel::getInstance()->query("SELECT distinct(type) FROM main_data");
           return $result->fetchAll();
        }

        public function getDataBySalaryCount()
        {
           $result = DBmodel::getInstance()->query("SELECT salary, count(id) as cc from main_data group by salary having cc>5 or salary>60000 order by salary");
           return $result->fetchAll();
        }

        public function getDataSalaryBySelectType()
        {
           $result = DBmodel::getInstance()->query("SELECT * from main_data where type=?");
           return $result->fetchAll();
        }

        public function getCountResume()
        {
           $result = DBmodel::getInstance()->query("SELECT count(id) from main_data");
           return $result->fetch(); 
        }

        public function __construct()
        {

        }
}

