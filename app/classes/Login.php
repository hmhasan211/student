<?php
namespace App\classes;
use App\classes\Database;
class Login
{
    public function adminLoginCheck($data){
       $email =htmlentities($data['email']);
       $password = htmlentities(md5($data['password']));
        if( $email=='' OR $password=='' ){
            $message = "<div class='alert alert-danger '><strong>Sorry!</strong> Field must not be empty.  </div>";
            return $message;
        }
       $sql = "select * from users where email = '$email' and password='$password'  ";

       $queryResult = mysqli_query(Database::dbConnection(),$sql);

            if (mysqli_query(Database::dbConnection(),$sql)){
                $result = mysqli_fetch_assoc($queryResult);
                    if ($result){
                        session_start();
                        $_SESSION['id']= $result['id'];
                        $_SESSION['name']= $result['name'];
                        $_SESSION['u_name']= $result['u_name'];
                        header("Location: dashboard.php");
                    }else{
                        $message = "<div class='alert alert-danger '><strong>Sorry!</strong> Email & Password not found.  </div>";
                        return $message;
                    }
            }else{
                die('query Problem'.mysqli_error(Database::dbConnection()));
            }
    }



    public function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['u_name']);

        header('Location: index.php');
    }


    public function registerInfo($data){
        $name=htmlentities($data['name']);
        $u_name=htmlentities($data['u_name']);
        $mobile=htmlentities($data['mobile']);
        $email=htmlentities($data['email']);
        $password=htmlentities(md5($data['password']));
        $address=htmlentities($data['address']);
       

        if($name==''  OR $u_name=='' OR $mobile=='' OR $email=='' OR $password=='' OR $address=='' ){
                $message = "<div class='alert alert-danger'><strong>Sorry!</strong> Field must not be empty.  </div>";
                return $message;
        }


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)===false){
            $message = "<div class='alert alert-danger'><strong>Sorry!</strong> Email is not valid.  </div>";
            return $message;
        }

        $sql = "INSERT INTO users (name,u_name,mobile,email,password,address) VALUES ('$name','$u_name','$mobile','$email','$password','$address')";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "<div class='alert alert-success'><strong>Welcome!!</strong> &nbsp;Your registration is successful!! </div>";
            return $message;
         
        }else{
            die('query problem'.mysqli_error(Database::dbConnection()));
        }
    }

  

}