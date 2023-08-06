<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?=5">
    <link rel="stylesheet" href="style_index.css?=5">
    <title>Login Page</title>
</head>
<body>
    <div id="head">
    </div><center>
    <div id="form">
        <br><center>
        <center>
    <font id="under_head">Admin Login</font>
</center>
<br><br>
<form action="admin_check.php" method="POST">
<div class="form-group">
        <input type="text" id="user" name="username" class="txtbox" onchange="del();">
        <label for="user" id="user-label">Username: </label>
    </div>
    <br>
    <div class="form-group">
        <input type="password" id="pass" name="password" class="txtbox" onchange="del2();">
        <label for="pass" id="pass-label">Password: </label>
    </div>
    <br>
    <button>Submit <span class="fa fa-arrow-right"></button>
</form>
    </div></center>
</body>
<script>
    function showLabel(labelId) {
    const label = document.getElementById(labelId);
    label.style.transform = "translateY(-100%)";
    label.style.fontSize = "12px";
}
function del(){
    if(document.getElementById('user').value!=""){
        document.getElementById("user-label").style.opacity = "0";
    }
    else if(document.getElementById('user').value==""){
        document.getElementById("user-label").style.opacity= 1;
    }
}
function del2(){
    if(document.getElementById('pass').value!=""){
        document.getElementById("pass-label").style.opacity = "0";
    }
    else if(document.getElementById('pass').value==""){
        document.getElementById("pass-label").style.opacity= 1;
    }
}
</script>
</html>