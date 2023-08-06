<?php include_once('include.php'); ?>
<html>
<head>
    <link rel="stylesheet" href="style.css?=6">
    <link rel="stylesheet" href="style_post.css?=6">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != 1) {
    header("Location: index.php");
    exit;
}

// Get the logged user's username
$loggedUser = $_SESSION["loggedUser"];

if (isset($_GET['name'])) {
    // Get the name from the 'name' parameter in the URL
    $receiver = $_GET['name'];
} else {
    header("Location: chats.php");
    exit;
}

// Fetch posts where the logged user is either the sender or the receiver
$sql = "SELECT * FROM `posts` WHERE (`Username` = ? AND `Reciever` = ?) OR (`Username` = ? AND `Reciever` = ?) ORDER BY `S.no` ASC";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if (!$stmt) {
    die("Error: " . $conn->error);
}

// Bind the parameters
$stmt->bind_param("ssss", $loggedUser, $receiver, $receiver, $loggedUser);

// Execute the prepared statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Close the prepared statement
$stmt->close();
?>
<header>
    <?php 
    echo "<center><div id='blessing'>Hello, " . $_SESSION["loggedUser"]. "</div>";?>
</header>
<form action="logout.php" id="logout" method="GET">
    <input type="submit" value="Logout">
</form></center>

<main id="main">
    <?php
    while ($rows = $result->fetch_assoc()) {
        $username = ($rows['Username'] === $loggedUser) ? 'You' : $rows['Username'];
    ?>
    
        <div id="blog">
            <?php echo "<p>" . $username . " : " . $rows['Post'] . "</p><br>"; ?>
        </div>
    
    <?php } ?>
</main><br><br>
<div id="message">
    <form id="formbox" action="post_upload.php" method="POST"  onsubmit="return validateForm()">
        <!-- Add the 'onkeydown' attribute to call the JavaScript function -->
        <textarea id="inputtext" name="inputtxt" style="resize:none;" onkeydown="handleEnterKeyPress(event)"></textarea>
        <!-- Hidden field to pass the receiver name -->
        <input type="hidden" name="receiver" value="<?php echo $receiver; ?>">
        <button id="Sender"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    </form>
</div>


<title><?php echo $receiver; ?></title>
<script>
     // Function to handle Enter key press event in the textarea
     function handleEnterKeyPress(event) {
        // Check if the pressed key is Enter (key code 13)
        if (event.keyCode === 13 && !event.shiftKey) {
            event.preventDefault(); // Prevent default behavior (adding a new line)
            var inputtext = document.getElementById("inputtext").value.trim(); // Get the value and remove leading/trailing spaces
            if (inputtext !== "") {
                document.getElementById("formbox").submit(); // Submit the form if the text is not empty
            }
        }
    }

        function scrollToLastPost() {
        var main = document.getElementById("main");
        main.scrollTop = main.scrollHeight;
    }

    // Wait for the page to load completely and then scroll to the last post
    window.addEventListener("load", function() {
        scrollToLastPost();
    });
    function validateForm() {
        var inputtext = document.getElementById("inputtext").value.trim(); // Get the value and remove leading/trailing spaces
        if (inputtext === "") {
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
</body>
</html>
