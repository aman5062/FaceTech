<?php
include_once('include.php');

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != 1) {
    header("Location: index.php");
    exit;
}

$loggedUser = $_SESSION["loggedUser"];

// Fetch users from the 'login' table except for the logged-in user
$sql = "SELECT * FROM `login` WHERE `Name` != ? ORDER BY `S.no` ASC";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if (!$stmt) {
    die("Error: " . $conn->error);
}

// Bind the parameter and execute the statement
$stmt->bind_param("s", $loggedUser);
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Close the prepared statement
$stmt->close();

?>

<html>
<head>
    <link rel="stylesheet" href="style.css?=6">
    <link rel="stylesheet" href="style_chats.css?=6">
</head>
<body>
<header>
    <?php 
    echo "<center><div id='blessing'>Hello, " . $_SESSION["loggedUser"]. "</div>";?>
</header>
<form action="logout.php" id="logout" method="GET">
    <input type="submit" value="Logout">
</form>
</center>
<center>
<main>
   <?php
   while ($rows = $result->fetch_assoc()) {
   ?>
      <center>
         <div id="blog">
            <?php echo "<a href='post.php?name=" . urlencode($rows['Name'])."'>".$rows['Name']."</a><br>"; ?>
         </div>
      </center>
   <?php } ?>
</main><br><br>

<title><?php echo $_SESSION["loggedUser"]; ?></title>
</body>
</html>
