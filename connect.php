<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try{
    $conn=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connected";
}catch(PDOException $e){
    echo "Fail : ".$e->getMessage();
}

// $conn = new mysqli($hostname, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Fail : " . $conn->connect_error);
// } else {
//     echo "Success";
// }

// $conn=mysqli_connect($hostname,$username,$password,$dbname);
// if(!$conn){
//     die("Fail : ".mysqli_connect_error());
// }else{
//     echo "Successfully connected";
// }

