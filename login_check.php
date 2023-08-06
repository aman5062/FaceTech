<link rel="stylesheet" href="style.css?=5">
<?php include_once('include.php'); ?>
<?php session_start(); ?>

<?php  
$name = $_POST["username"]; 
$password = $_POST["password"];

$sql = "SELECT * FROM login WHERE Username = '$name' AND Password = '$password'";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  

if ($count == 1) {  
    $_SESSION["loggedin"] = true;
    $_SESSION["loggedUser"] = $row['Name']; // Store the 'Name' column in the session variable
    
    header("location: post.php");
} else {
    echo "<center>Login Unsuccessfull!!!";
    echo "<br><br><button onclick='signup()'>Signup  <span class='fa fa-arrow-right'></button>";
    echo "<br><br><button onclick='login()'><span class='fa fa-arrow-left'> Login</button></center>";
} 
?> 
<script>
     function signup(){
        window.location = "signuppage.php";
    }
    function login(){
        window.location = "index.php";
    }
</script>