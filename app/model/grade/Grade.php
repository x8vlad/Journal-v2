<?php

namespace app\model\grade;

use core\Model;

class Grade extends Model
{
    private $db;

    public function __construct($registry)
    {
        $this->db = $registry->get('db');
    }

    public function getAVGGrades($userID){
        $queryAVGGrade = "SELECT subjects.name, grades.sub_id, ROUND(AVG(grades.grade),2) AS avg_grade
	    FROM `grades` LEFT JOIN subjects ON subjects.id=grades.sub_id 
		    WHERE user_id=:user_id GROUP BY grades.sub_id;";
        $stmt = $this->db->connect()->prepare($queryAVGGrade);
        $stmt->bindValue(":user_id", $userID);
        if(!$stmt->execute()){
            return false;
        }
        $totalAVGQuery = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $totalAVGQuery;
    }


    //methodfs to get grade from first period ..$queryFirstGrade..
    public function getFirstPeriodGrade($userID) {
        $queryFirstGrade = "SELECT sub_id, AVG(grade) AS grade_first 
            FROM `grades` 
            WHERE created_at < '2025-05-08' AND user_id=:user_id 
            GROUP BY sub_id;";

        $stmt = $this->db->connect()->prepare($queryFirstGrade);
        $stmt->bindValue(":user_id", $userID);
        if(!$stmt->execute()){
            return false;
        }
        $totalQueryFirstGrade = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $totalQueryFirstGrade;
    }


    //methodfs to get grade from second period ..$querySecondGrade..}
    public function getSecondPeriodGrade($userID) {
        $querySecondGrade = "SELECT sub_id, AVG(grade) AS grade_second FROM `grades` 
            WHERE created_at > '2025-05-08' AND user_id=:user_id
            GROUP BY sub_id;";
        $stmt = $this->db->connect()->prepare($querySecondGrade);
        $stmt->bindValue(":user_id", $userID);
        if(!$stmt->execute()){
            return false;
        }
        $totalQuerySecondGrade = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $totalQuerySecondGrade;
    }
}