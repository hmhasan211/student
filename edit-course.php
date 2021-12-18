<?php
session_start();
if ($_SESSION['id']==null){
    header("Location: index.php");
}

require_once 'vendor/autoload.php';
use App\classes\Login;
use App\classes\Course;

if (isset($_GET['logout']))
    Login::adminLogout();

//edit
    $id=$_GET['id'];
    $queryResult = Course::getCourseInfoById($id);
    $result = mysqli_fetch_assoc($queryResult);

if(isset($_POST['btn'])) {
    Course::updateCourseInfo($_POST);
}

?>
<?php include "includes/header.php";?>

    <br>
    <div class="row" style="margin-top: 50px">
        <div class="col-md-6 col-md-offset-3" >
            <?php if (isset($message)){ echo $message;} ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center ">Add Course</h4>
                </div>
                <div class="panel-body">
                    <form action=" " method="POST" class="form-horizontal">

                    <div class="form-group">
                            <label class="control-label col-md-4">Course</label>
                            <div class="col-md-8">
                                <select name="course" class="form-control" >
                                    <option value="<?php echo $result['course'];?>"><?php echo $result['course'];?></option>
                                    <option value="Wdpf">Wdpf</option>
                                    <option value="Esad">Esad</option>
                                    <option value="Auto-cad">Auto-cad</option>
                                    <option value="Java">Java</option>
                                    <option value="Database">Database</option>
                                    <option value="Graphics">Graphics</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-4">TSP</label>
                            <div class="col-md-8">
                            <label><input type="radio"  name="tsp_location" <?php echo $result['tsp_location']=='NVIT'? 'checked':''; ?> value="NVIT"/> NVIT</label>
                            <label><input type="radio"  name="tsp_location" <?php echo $result['tsp_location']=='DIIT'? 'checked':''; ?> value="DIIT"/> DIIT</label>
                            <label><input type="radio"  name="tsp_location" <?php echo $result['tsp_location']=='MACRO'? 'checked':''; ?> value="MACRO"/> MACRO</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Round</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="round" value="<?php echo $result['round'];?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $result['id'];?>">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-4">Batch</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="batch" value="<?php echo $result['batch'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4"> Status </label>
                            <div class="col-md-8">
                                <label><input type="radio"  name="status" <?php echo $result['status']==1? 'checked':''; ?> value="1"/> Active</label>
                                <label><input type="radio"  name="status" <?php echo $result['status']==0? 'checked':''; ?> value="0"/> Deactive</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Course info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php";?>