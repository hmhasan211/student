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

//delete
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $message = Course::deleteCourseInfo($id);
}

//view
$queryResult = Course::getAllCourseInfo();

?>
<?php include "includes/header.php";?>

    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php if (isset($message)){echo $message;} ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Course</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped text-center">
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th >Round</th>
                            <th>Course</th>
                            <th>Batch</th>
                            <th> TSP </th>
                            <th> Status</th>
                            <th>Action</th>
                        </tr>

                        <?php $i=1; ?>
                        <?php while ($result = mysqli_fetch_assoc($queryResult)) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $result['round']; ?></td>
                                <td><?php echo $result['course']; ?></td>
                                <td><?php echo $result['batch']; ?></td>
                                <td><?php echo $result['tsp_location']; ?></td>
                                <td><?php echo $result['status']==1?  'Active':'Deactive'; ?></td>
                                <td>

                                    <?php echo $result['status']==1 ? '<a href="#" class="btn btn-info btn-xs" title="Deactive">
                                  <span class="glyphicon glyphicon-arrow-up"></span>
                                  </a>':'<a href="#" class="btn btn-warning btn-xs" title="Active">
                                  <span class="glyphicon glyphicon-arrow-down"></span>
                                  </a>';
                                    ?>

                                    <a href="edit-course.php?id=<?php echo $result['id'];?>" class="btn btn-success btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="?delete=true&id=<?php echo $result['id']; ?>" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>

                                </td>
                            </tr>
                          <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php";?>