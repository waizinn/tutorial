<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $uname=$_POST['username'];
    $ps=md5($_POST['password']);
    $err="";
    if(empty(trim($uname))){
        $err="Please enter your username.";
    }else if(empty(trim($ps))){
        $err="Please enter your password";
    }
    if($err==''){
        require_once('connect.php');
        $sql="INSERT INTO `user` (`username`,`password`) VALUES ('$uname','$ps');";
        $conn->exec($sql);
        header("Location: /test/");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
    
    <h3 class="mt-4">Registration Form</h3>
    <form action="" method="post">
        <div class="form-group"> 
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Register">
        <p><a href='index.php'>Click here to login.</a></p>
    </form>

   
    </div>
</body>

</html>

