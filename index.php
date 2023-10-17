<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
$uname=$_POST['username'];
$ps=md5($_POST['password']);
$err='';
if(empty(trim($uname))){
    $err="Please enter your username.";
}else if(empty(trim($ps))){
    $err="Please enter your password";
}
if($err==''){
    require_once('connect.php');
    $sql="SELECT * FROM user WHERE username='$uname' AND password='$ps'";
   $row= $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
//    header('Content-Type: text/json');
//    echo json_encode($row);
//    exit;
// $sql="SELECT * FROM user WHERE username= :a AND password= :b ";
// $check =$conn->prepare($sql,[PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY]);
// $check->bindParam(':a', $uname);
// $check->bindParam(':b', $ps);
// $check->execute();
// $row=$check->fetch(PDO::FETCH_ASSOC);
if($row['id']>0){
    $_SESSION['login']=true;
    $_SESSION['id']=$row['id'];
    $_SESSION['uname']=$row['username'];
}
}
}

if($_SESSION['login']){
    header ("Location: home.php");
    exit;
    // echo "You have already logined.";
}else{

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
    <h3 class="mt-4">Login Form</h3>
    <form action="" method="post">
        <div class="form-group"> 
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
        <p>If you don't have an account, <a href='reg.php'>click here to create your account.</a></p>
    </form>
    </div>
</body>

</html>
<?php } ?>