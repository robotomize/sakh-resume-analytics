
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

        public function getAvgSalaryVacancy()
        {
                $result = DBmodel::getInstance()->query("SELECT type, AVG(salary) FROM main_data_vacancy GROUP BY type");
                return $result->fetchAll();
        }

        public function getMaxSalaryByTypeVacancy()
        {
            $result = DBmodel::getInstance()->query("SELECT type, MAX(salary) FROM main_data_vacancy GROUP BY type");
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

        public function getAvgSalryFromAllVacancy()
        {
           $result = DBmodel::getInstance()->query("SELECT AVG(salary) from main_data_vacancy");
           return $result->fetch(); 
        }

        public function getMaxSalryFromAllVacancy()
        {
           $result = DBmodel::getInstance()->query("SELECT Max(salary) from main_data_vacancy");
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

        public function getCountVacancy()
        {
           $result = DBmodel::getInstance()->query("SELECT count(id) from main_data_vacancy");
           return $result->fetch(); 
        }   

        public function getCheckEntryAboutVacancy()
        {
           $result = DBmodel::getInstance()->query("SELECT * from main_data where name=? and type=? ");
           return $result->fetchAll();
        }

        public function __construct()
        {

        }
}

$objectStart = new Model();

$dataAvgSalaryByType = $objectStart->getAvgSalaryByOld();
$dataMaxSalaryByOld = $objectStart->getMaxSalaryByOld();

$dataAvgSalaryFromType = $objectStart->getAvgSalary();
$dataMaxSalaryFromType = $objectStart->getMaxSalaryByType();

$dataAvgSalaryFromAll = $objectStart->getAvgSalryFromAll();
$dataMaxSalaryFromAll = $objectStart->getMaxSalryFromAll();
$dataByTypeFromSalary = $objectStart->getDataByTypeFromSalary();
$dataGroupSalaryByCount = $objectStart->getDataBySalaryCount();

$dataCountResume = $objectStart->getCountResume();
$objectConvert = new Math(round($dataAvgSalaryFromAll["0"]),round($dataMaxSalaryFromAll["0"]));


