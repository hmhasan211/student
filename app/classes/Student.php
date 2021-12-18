<?php


namespace App\classes;
use App\classes\Database;
use App\classes\Course;

class Student
{
   
    public function saveStudentInfo($data){

        $Name=htmlentities($data['name']);
        $email=htmlentities($data['email']);
        $contact=htmlentities($data['contact']);
        $address=htmlentities($data['address']);
        $courseName=htmlentities($data['course']);
        $tsp=htmlentities($data['tsp']);
        $batch=$data['batch_id'];
        $gender=$data['gender'];

        if ($Name=='' OR  $email=='' OR $contact=='' OR $address=='' OR $courseName=='' OR $tsp==''   OR $gender=='' ){
            $message = "<div class='alert alert-danger'><strong>Sorry!</strong> Field must not be empty.  </div>";
            return $message;
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message = "<div class='alert alert-danger'><strong>Sorry!</strong> Email is not valid.  </div>";
            return $message;
        }

        $sql = "INSERT INTO  students (name,email,contact,address,course,tsp,batch_id,gender) VALUES ('$Name','$email','$contact','$address','$courseName','$tsp','$batch','$gender')";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "<div class='alert alert-success'>Data saved successfully!! </div>";
            return $message;
        }else{
            die('query problem'. mysqli_errno( Database::dbConnection()));
        }
    }

    
    public function getAllStudentInfo(){
        $sql = "SELECT * FROM students";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $queryResult = mysqli_query( Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

   //Edit
    public function getStudentInfoById($id){
        $sql = "SELECT * FROM students WHERE id = '$id' ";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $queryResult = mysqli_query( Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

    /*Update*/
    public function updateStudentInfo($data){
        $Name=htmlentities($data['name']);
        $email=htmlentities($data['email']);
        $contact=htmlentities($data['contact']);
        $address=htmlentities($data['address']);
        $courseName=htmlentities($data['course']);
        $tsp=htmlentities($data['tsp']);
        $batch=$data['batch_id'];
        $gender=$data['gender'];
        $id=$data['id'];
        
        $sql = "UPDATE students SET 
                               name ='$Name',
                               email ='$email',
                               contact ='$contact',
                               address ='$address',
                               course ='$courseName',
                               tsp	 ='$tsp',
                               batch_id ='$batch', 
                               gender ='$gender'  WHERE id='$id' ";
                               
        if (mysqli_query( Database::dbConnection(), $sql)){
            header('Location: manage-student.php');
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }


    
    public function deleteStudentInfo($id){
        $sql = "DELETE FROM students WHERE id='$id' ";

        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "<div class='alert alert-danger'>Data deleted successfully!! </div>";
            return $message;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

//ViewBatch
    public function getBatchIDByStatus(){
        $sql = "SELECT * FROM course WHERE status = 1 ";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $qResult = mysqli_query( Database::dbConnection(), $sql);
            return $qResult;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

}