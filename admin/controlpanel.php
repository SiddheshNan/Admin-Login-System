<?php

//error_reporting(E_ERROR | E_PARSE);
// error_reporting(0);
session_start();

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $_SESSION['message'] = 'error';
    header("location: ./index.php");
    exit;
}
$staffname = $_SESSION['staff_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <title>AimTechsWiFi</title>
    <meta charset="utf-8">
    <style>.centerContent{text-align:center}</style>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="icon" href="../assets/cpu.png">
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    <style>.btn-1:active,.btn-2:active,.btn-3:active,.btn-4:active{top:2px}.btn1{border:none;font-family:inherit;font-size:inherit;color:inherit;background:0 0;cursor:pointer;padding:15px 80px;display:inline-block;margin:15px 30px;text-transform:uppercase;letter-spacing:1px;font-weight:700;outline:0;position:relative;-webkit-transition:all .3s;-moz-transition:all .3s;transition:all .3s}.btn-1{color:#fff;background:#1ABC9C;-webkit-transition:none;-moz-transition:none;transition:none}.btn-2,.btn-3{-webkit-transition:none;-moz-transition:none}.btn-1c{border:4px solid #1ABC9C;border-radius:60px}.btn-1c:hover{background:0 0;color:#1ABC9C}.btn-2{color:#fff;background:#3498DB;transition:none}.btn-2c{border:4px solid #3498DB;border-radius:60px}.btn-2c:hover{background:0 0;color:#3498DB}.btn-3{color:#fff;background:#A569BD;transition:none}.btn-3c{border:4px solid #A569BD;border-radius:60px}.btn-3c:hover{background:0 0;color:#A569BD}.btn-4{color:#fff;background:#E74C3C;-webkit-transition:none;-moz-transition:none;transition:none}.btn-4c{border:4px solid #E74C3C;border-radius:60px}.btn-4c:hover{background:0 0;color:#E74C3C}</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="navbar-brand" href="/">AimTechsWiFi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link">Hello, <?php echo "$staffname"; ?> </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="controlpanel.php">Control Panel<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_create.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_editor.php">User Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../users/user_login.php">User Login</a>
                    </li>
                    <li>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;</li>
                    <li>
                        <a href="admin_logout.php"> <button class="btn btn-danger">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div style="centerContent">
    <p></p><h2>AimTechs</h2>
           <h3>Super Secret Control Panel</h3>
            <p1>Welcome Back, <?php echo "$staffname"; ?> !</p1>
            <br>
    <div class="container">
        <div class="row">
            <div class="col-12"><a href="user_create.php" class="btn1 btn-1 btn-1c" role="button">Create User</a></div>
            <div class="col-12"><a href="user_editor.php" class="btn1 btn-3 btn-3c" role="button">User Management</a></div>
            <div class="col-12"> <a href="../users/user_login.php" class="btn1 btn-2 btn-2c" role="button">Login as User</a></div>
            <div class="col-12"><a href="admin_logout.php" class="btn1 btn-4 btn-4c" role="button">Logout Admin</a></div>
        </div>
    </div>
</div>

</body>
</html>
