<?php include_once('include.php'); ?>
<html>
    <head>
    <link rel="stylesheet" href="style.css?=5">
    <link rel="stylesheet" href="style_user.css">
        
</head>
<body>
<?php
session_start();
if(isset($_SESSION["loggedin"]) != 1)
{
    header("Location: index.php");
    echo $_SESSION["loggedin"];
}
else{
// echo "<script>alert('Login Successfull!!!')</script>";
echo "<center><div id='blessing'>Hello " . $_SESSION["loggedUser"];
echo "<br><p>Welcome to Our Fantastic Website !!!!</p></div></br>";
}
?>
<form action="admin_logout.php" method="GET">
    <input type="submit" value="Logout">
</form></center>
<title><?php echo $_SESSION["loggedUser"]; ?></title>
</body>
</html>
