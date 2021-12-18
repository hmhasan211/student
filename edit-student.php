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



//edit
    $id = $_GET['id'];
    $queryResult = Student::getStudentInfoById($id);
    $result = mysqli_fetch_assoc($queryResult);

//batchID
$qResult = Student::getBatchIDByStatus();

//update
if(isset($_POST['btn'])) {
    Student::updateStudentInfo($_POST);
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
                    <form action=" " method="POST" class="form-horizontal" name="edit-studentForm">


<input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <div class="form-group">
                            <label class="control-label col-md-4">Student Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="text" name="email" class="form-control" value="<?php echo $result['email']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Contact</label>
                            <div class="col-md-8">
                                <input type="text" name="contact" class="form-control" value="<?php echo $result['contact']; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4">Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="address"><?php echo $result['address']; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4">Course</label>
                            <div class="col-md-8">
                                <select name="course" class="form-control" >
                                    <option value="">----Select course----</option>
                                    <option value="Wdpf" <?= $result['course']=="Wdpf"?"selected":''; ?>>Wdpf</option>
                                    <option value="Esad" <?= $result['course']=="Esad"?"selected":''; ?>>Esad</option>
                                    <option value="Auto-cad" <?= $result['course']=="Auto-cad"?"selected":''; ?>>Auto-cad</option>
                                    <option value="Java" <?= $result['course']=="Java"?"selected":''; ?>>Java</option>
                                    <option value="Database" <?= $result['course']=="Database"?"selected":''; ?>>Database</option>
                                    <option value="Graphics" <?= $result['course']=="Graphics"?"selected":''; ?>>Graphics</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">TSP</label>
                            <div class="col-md-8">
                                <select name="tsp" class="form-control" >
                                    <option value="">----Select TSP----</option>
                                    <option value="NVIT" <?= $result['tsp']=="NVIT"?"selected":''; ?>>NVIT</option>
                                    <option value="DIIT" <?= $result['tsp']=="DIIT"?"selected":''; ?>>DIIT</option>
                                    <option value="MACRO" <?= $result['tsp']=="MACRO"?"selected":''; ?>>MACRO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Batch Id</label>
                            <div class="col-md-8">
                                <select name="batch_id" class="form-control">
                                    <option value="<?php echo $result['batch_id']; ?>"><?php echo $result['batch_id']; ?></option>
                                    <?php while ($result1=mysqli_fetch_assoc($qResult)) {?>
                                        <option value="<?php echo $result1['batch'] ?>"  <?= $result['batch_id']==$result1['batch']?"selected":''; ?>><?php echo $result1['batch'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4"> Gender </label>
                            <div class="col-md-8">
                                <label><input type="radio"   name="gender" <?= $result['gender']=='M'? 'checked':''; ?> value="M" /> Male</label>
                                <label><input type="radio"  name="gender"  <?= $result['gender']=='F'? 'checked':'';  ?>  value="F"/> Female</label>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Student info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php";?>