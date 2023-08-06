<link rel="stylesheet" href="style.css?=5">
<?php include_once('include.php'); ?>
<?php session_start(); ?>

<?php  
$name = $_POST["username"]; 
$password = $_POST["password"];

$sql = "SELECT * FROM admin WHERE Username = '$name' AND Password = '$password'";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  

if ($count == 1) {  
    $_SESSION["loggedin"] = true;
    $_SESSION["loggedUser"] = $row['Name']; // Store the 'Name' column in the session variable
    
    header("location: admin_portal.php");
} else {
    echo "<center>Login Unsuccessfull!!!";
} 
?> 