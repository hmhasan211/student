<?php
session_start();
if ($_SESSION['id']==null){
    header("Location: index.php");
}

require_once 'vendor/autoload.php';
use App\classes\Login;
use App\classes\Student;

if (isset($_GET['logout']))
    Login::adminLogout();

//delete
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $message = Student::deleteStudentInfo($id);
}



//view
$queryResult = Student::getAllStudentInfo();

?>
<?php include "includes/header.php";?>

    <br>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($message)){echo $message;} ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Students</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped text-center">
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Student Name</th>
                            <th>Email Address</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Course</th>
                            <th>TSP </th>
                            <th>Batch Id</th>
                            <th> Gender </th>
                            <th>Action</th>
                        </tr>

                        <?php $i=1; ?>
                        <?php while ($result = mysqli_fetch_assoc($queryResult)) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $result['name']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['contact']; ?></td>
                                <td><?php echo $result['address']; ?></td>
                                <td><?php echo $result['course']; ?></td>
                                <td><?php echo $result['tsp']; ?></td>
                                <td><?php echo $result['batch_id']; ?></td>
                                <td><?php echo $result['gender']; ?></td>
                                <td>

                                    <a href="edit-student.php?id=<?php echo $result['id'];?>" class="btn btn-success btn-xs" title="Edit">
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