<?php
    session_start();
    if (isset($_SESSION['id'])){
        header('Location: dashboard.php');
    }

    include_once 'vendor/autoload.php';
    $login = new \App\classes\Login();
  

    if (isset($_POST['btn'])){
        $message = $login->adminLoginCheck($_POST);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container  ">

   <div class="col-md-4 offset-4 " style="margin: 100px auto;">
       <?php if (isset($message)){ echo $message;}?>
       <div class="card ">
          <div class="card-header">
             <h4>Please Login </h4>
          </div>
           <div class="card-body">

               
               <form role="form" method="post" action="">
                   <fieldset>
                       <div class="form-group">
                           <input class="form-control" placeholder="E-mail" name="email" type="email" value="hamidhasan66@gmail.com" autofocus>
                       </div>
                       <div class="form-group">
                           <input class="form-control" placeholder="Password" name="password" type="password" value="1234">
                       </div>
                       <div class="checkbox">
                           <label>
                               <input name="remember" type="checkbox" value="Remember Me">Not have an account?
                           </label>
                           <a href="register.php">Register now</a>
                       </div>
                       <input type="submit" name="btn" value="Login" class="btn btn-success btn-block">
                   </fieldset>
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
