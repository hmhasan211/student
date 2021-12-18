<?php


namespace App\classes;
use App\classes\Database;

class Course
{
   
    public function saveCourseInfo($data){
        $round=htmlspecialchars($data['round']);
        $course=htmlspecialchars($data['course']);
        $tsp_location=strtoupper($data['tsp_location']);
        $batch = $data['batch'];
        $status=$data['status'];

        if($round==''  OR $course=='' OR $tsp_location=='' OR  $batch =='' OR $status==''){
            $message = "<div class='alert alert-danger'><strong>Sorry!</strong> Field must not be empty.  </div>";
            return $message;
        }


        $sql = "INSERT INTO course (round,course,tsp_location,batch,status) VALUES ('$round','$course','$tsp_location','$batch','$status')";

        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "<div class='alert alert-success'>Data saved successfully!! </div>";
            return $message;
        }else{
            die('query problem'. mysqli_errno( Database::dbConnection()));
        }
    }

    
    public function getAllCourseInfo(){
        $sql = "SELECT * FROM course";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $queryResult = mysqli_query( Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

   
    public function getCourseInfoById($id){
        $sql = "SELECT * FROM course WHERE id = '$id' ";

        if (mysqli_query( Database::dbConnection(), $sql)){
            $queryResult = mysqli_query( Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

    
    public function updateCourseInfo($data){
        $sql = "UPDATE course SET round='$data[round]', course='$data[course]', tsp_location='$data[tsp_location]', status='$data[status]' WHERE id='$data[id]'";
        if (mysqli_query( Database::dbConnection(), $sql)){
            header('Location: manage-course.php');
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }


    
    public function deleteCourseInfo($id){
        $sql = "DELETE FROM course WHERE id='$id' ";

        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "<div class='alert alert-danger'>Data deleted successfully!! </div>";
            return $message;
        } else {
            die('query problem'. mysqli_errno(Database::dbConnection()));
        }
    }

}