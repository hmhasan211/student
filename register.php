<?php
    session_start();
    if (isset($_SESSION['id'])){
        header('Location: dashboard.php');
    }

    include_once 'vendor/autoload.php';
    $login = new \App\classes\Login();


    if (isset($_POST['btn'])){
        $message = $login->registerInfo($_POST);
    }
$emailErr= $PassErr= '';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Register</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  

</head>

<body>
<div class="col-sm-6" style="margin: 15px"> <a href="index.php" class="btn btn-primary ">Back</a></div>
<div class="container ">
   <div class="col-sm-6  " style="margin: 0 auto;">
       <?php if (isset($message)){ echo $message;}?>
       <div class="card ">

          <div class="card-header">
             <h4>Register  </h4>
          </div>

           <div class="card-body ">
               
              <form  method="post" action="">

                  <div class="form-group row">
                      <label for="cat_name" class="col-sm-3">Full Name </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="name">
                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="cat_name" class="col-sm-3">Username</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control"name="u_name">
                      </div>
                  </div>

                    <div class="form-group row">
                          <label for="cat_name" class="col-sm-3"> Email &nbsp; *</label>
                        <div class="col-sm-9">
                              <input type="text" class="form-control"name="email">
                          </div>
                      </div>



                         <div class="form-group row">
                          <label for="cat_name" class="col-sm-3"> Mobile </label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control"name="mobile">
                          </div>
                      </div>


                       <div class="form-group row">
                          <label for="cat_name" class="col-sm-3"> Password &nbsp; *</label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control"name=" password">
                          </div>
                      </div>

                       <div class="form-group row">
                          <label for="cat_name" class="col-sm-3"> Address</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control"name="address">
                          </div>
                      </div>



                   <div class="form-group row">
                       <label for="cat_name" class="col-sm-3"></label>
                       <div class="col-sm-9">
                           <button type="submit" name="btn" class="btn badge-success btn-block">Save Info</button>
                       </div>
                   </div>

               </form>
           </div>
       </div>

   </div>

</div>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
