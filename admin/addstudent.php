<?php
session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}


if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $department = $_POST["department"];
    $phone = $_POST["phone"];
    $password = md5($_POST["password"]);

    $errors = [];
    if (empty($_POST["email"])){
        $errors[]="The email is required";
    }
    if (empty($_POST["password"])){
        $errors[]="The password is required";
    }
    if (empty($_POST["name"])){
        $errors[]="The name is required";
    }
    if (empty($_POST["department"])){
        $errors[]="The department is required";
    }
    if (empty($_POST["phone"])){
        $errors[]="The phone is required";
    }

    if (empty($errors)){
    
        if (addstudent($name,$email,$password,$department,$phone)) {
            header("LOCATION:students.php");
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
    <title>اضافة طالب</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav>
        <div class="nav container">
            <div class="items mt-3">
                <a href="home.php">
                    <h3>الرئيسية</h3>
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION["admin"]["name"] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>
                        </ul>
                    </div>
            </div>
            <div class="logo py-2">
                <a href="home.php"><img src="../assets/imgs/logo.jpeg" style="height: 50px;" alt="" /></a>
            </div>
        </div>
    </nav>
    <article class="auth">
        <div class="header">
            <h1>اضافة طالب</h1>
        </div>
        <section class="login-card" id="regcard">
            <form action="addstudent.php" method="POST">
                <div class="form-group">

                <input type="text" class="form-control" placeholder="الاسم" name="name" />
                <input type="email" class="form-control" placeholder="الايميل" name="email" />
                <input type="password" class="form-control" placeholder="كلمة المرور" name="password" />
                <input type="text" class="form-control" placeholder="القسم" name="department" />
                <input type="text" class="form-control" placeholder="رقم الهاتف" name="phone" />

                </div>
                <button type="submit" class="btn">اضافة</button>
            </form>
        </section>
    </article>
    <script src="js/index.js"></script>
</body>

</html>