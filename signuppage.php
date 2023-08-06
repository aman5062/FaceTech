<?php include_once('include.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css?=5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_signup.css?=3">
    <title>Document</title>
</head>
<body>
<?php 
    $sql = " SELECT * FROM login WHERE `S.no`=(SELECT max(`S.no`) FROM login)";
    $result = $conn->query($sql);
    $conn->close();
    ?>
<div id="head">
    </div><center><div id="count"><br><br><br>
    <?php
        while ($rows = $result->fetch_assoc()) {
        ?>
        Total
        <?php
        echo $rows['S.no'];
       
        }
        ?> Users Signed-In </div>
    <div id="form" style="height:auto !important; margin-top: none !important">
        <br><center>
            <font id="under_head">
                Sign Up
            </font><button id="login_page" onclick="loginpage();"><span class="fa fa-arrow-left"></span> Login</button></center>
            <br><br>
            <form action="signup_check.php" method="POST">
            <!-- <label for="name">Name: </label> -->
            <input type="text" id="name" placeholder="Name" name="name"><br>
            <!-- <label for="email">Email: </label> -->
            <input type="email" id="email" placeholder="Email Id" name="email"><br>
            <!-- <label for="user">Username: </label> -->
            <input type="username" id="user" placeholder="Username" name="user"><br>
            <!-- <label for="pass">Password: </label> -->
            <input type="password" id="pass"  name="pass" placeholder="*******"><br><br>
            <button class="btn btn--primary" style="margin-top:-25px;">Signup  <span class="fa fa-arrow-right"></button>
        </form></div></center>
</body>
<script>
    function loginpage(){
        window.location='index.php';
    }
</script>
</html>