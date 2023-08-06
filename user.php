<?php include_once('include.php'); ?>
<html>
    <head>
    <link rel="stylesheet" href="style.css?=6">
    <link rel="stylesheet" href="style_user.css?=6">
    <!-- <meta http-equiv="refresh" content="5"> -->
</head>
<body>
<?php
session_start();
if(isset($_SESSION["loggedin"]) != 1)
{
    header("Location: index.php");
    echo $_SESSION["loggedin"];
}
?>
<header>
    <?php 
    echo "<center><div id='blessing'>Hello, " . $_SESSION["loggedUser"]. "</div>";?>
</header>
<form action="logout.php" id="logout" method="GET">
    <input type="submit" value="Logout">
</form></center><center>
<main>
    <div><a href="chat.php"><div>ChatBox</div></a></div>
    <div><a href="notes.php"><div>NoteBook</div></a></div>
</main></center>
<title><?php echo $_SESSION["loggedUser"]; ?></title>
</body>
</html>
