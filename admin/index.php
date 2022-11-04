<?php
session_start();
require_once("lib.php");
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $errors = [];
    if (empty($_POST["email"])){
        $errors[]="The email is required";
    }
    if (empty($_POST["password"])){
        $errors[]="The password is required";
    }

    if (empty($errors)){
        $res = loginadmin($email,$password);
        if (!empty($res)) {
            $_SESSION['admin'] = $res;
            header("LOCATION:home.php");
        }
    }

}




?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الدخول</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <article class="auth">
        <div class="header">
            <h1>Admin</h1>
        </div>
        <section class="login-card" id="logincard">
        <form action="index.php" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="الايميل" />
                    <input type="password" name="password"  class="form-control" placeholder="كلمة المرور" />
                </div>
                <button type="submit" class="btn">دخول</button>
            </form>
        </section>
    </article>
    <script src="assets/js/index.js"></script>
</body>

</html>