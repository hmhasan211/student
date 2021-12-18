<?php


namespace App\classes;
use App\classes\Database;
use App\classes\Student;
use App\classes\Course;

class Tables
{
     /*  Read/ View  */
     public function getAllStudentInfo(){
        $sql = "SELECT * FROM students";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $queryR = mysqli_query( Database::dbConnection(), $sql);
            return $queryR;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }


      /*  Read/ View  */
      public function getAllCourseInfo(){
        $sql = "SELECT * FROM course";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $qResult = mysqli_query( Database::dbConnection(), $sql);
            return $qResult;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }
}