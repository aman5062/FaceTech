<link rel="stylesheet" href="style.css?=5">
<?php include_once('include.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // Validate if the Name and Email fields are not empty
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $user = $_POST["user"];
        $pass = $_POST["pass"];
    
        // Validate if the Name and Email fields are not empty
        if (empty($name) || empty($email)) {
            echo "<script>alert('Kindly fill all the Fields'); setTimeout(() => window.location.href = 'signuppage.php', 1000);</script>
            ";
        } else {
            // Prepare and execute the SQL query to insert the form data into the database
            $sql = "INSERT INTO `login` (`S.no`, `Username`, `Password`, `Email`, `Name`) VALUES (NULL, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $user, $pass, $email, $name);
    
            if ($stmt->execute()) {
                // Display a success message
                echo "<h1>Thank You</h1>";
                echo "<p>Hi $name, your form submission has been successfully stored in the database.</p>";
            } else {
                // Display an error message if the insertion fails
                echo "Error: " . $sql . "<br>" . $conn->$error;
            }
        }
    }
}
    // Close the database connection
    $conn->close();
    header('Refresh: 5; URL=index.php');
    ?>