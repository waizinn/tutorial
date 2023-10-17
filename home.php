<?php
session_start();
if(empty($_SESSION['login'])){
    header ("Location: logout.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h2 class="mt-4">Welcome <?php echo $_SESSION['uname']; ?> <a href="logout.php">Logout</a></h2>
<?php
require_once('connect.php');
$sql="SELECT * FROM user WHERE 1 ORDER BY username";
$rows= $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "<table class='table'>";
echo "<tr><th>ID</th><th>Name</th><th>Created</th></tr>";
foreach ($rows as $row){
echo "<tr><td>".$row['id']."</td> <td>".$row['username']."</td> <td>".$row['created']."</td></tr>";
}
echo "</table>";
?>

    </div>
</body>
</html>