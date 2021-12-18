<?php
session_start();
if ($_SESSION['id']==null){
    header("Location: index.php");
}

require_once 'vendor/autoload.php';
use App\classes\Login;
use App\classes\Course;
use App\classes\Student;

if (isset($_GET['logout']))
    Login::adminLogout();

//batchID
$qResult = Student::getBatchIDByStatus();

//read
if(isset($_POST['btn'])) {
    $message = Student::saveStudentInfo($_POST);
}

?>
<?php include "includes/header.php";?>

    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if (isset($message)){ echo $message;} ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center ">Add Student</h4>
                </div>
                <div class="panel-body">
                    <form action=" " method="POST" class="form-horizontal">



                        <div class="form-group">
                            <label class="control-label col-md-4">Student Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Contact</label>
                            <div class="col-md-8">
                                <input type="text" name="contact" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4">Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                        </div>


                       


                        <div class="form-group">
                            <label class="control-label col-md-4"> Gender </label>
                            <div class="col-md-8">
                                <label><input type="radio" checked name="gender" value="M" /> Male</label>
                                <label><input type="radio"  name="gender" value="F"/> Female</label>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Student info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php";?>