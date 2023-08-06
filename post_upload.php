<?php
include_once('include.php');

$inputtext = $_POST['inputtxt'];
$receiver = $_POST['receiver']; // Get the receiver name from the hidden input field

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have started the session elsewhere in your code.
session_start();

$name = $_SESSION["loggedUser"];

// Use prepared statement with parameter binding
$sql = "INSERT INTO `posts` (`S.no`, `Username`, `Post`, `Reciever`) VALUES (NULL, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    echo "Error: " . mysqli_error($conn);
    exit;
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "sss", $name, $inputtext, $receiver); // Bind the receiver as well

if (mysqli_stmt_execute($stmt)) {
    header("location: post.php?name=$receiver"); // Redirect to 'post.php' with the receiver name in the URL
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
