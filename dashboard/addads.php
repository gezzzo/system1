<?php
session_start();
require_once("lib.php");

if (empty($_SESSION["supervisor"])) {
    header("LOCATION:index.php");
}



if (isset($_POST["content"])) {
    $content = $_POST["content"];

    $errors = [];
    if (empty($_POST["content"])){
        $errors[]="The content is required";
    }


    if (empty($errors)){
    
        if (addads($content,$_SESSION["supervisor"]["id"])) {
            header("LOCATION:index.php");


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
    <title>Document</title>
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
                <a href="index.php">
                    <h3>الرئيسية</h3>
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION["supervisor"]["name"] ?>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>

                        </ul>
                    </div>
            </div>
            <div class="logo py-2">
                <a href="index.php"><img src="../assets/imgs/logo.jpeg" style="height: 50px;" alt="" /></a>
            </div>
        </div>
    </nav>
    <article class="auth">
        <div class="header">
            <h1>اضافة اعلان</h1>
        </div>
        <section class="login-card" id="regcard">
            <form action="addads.php" method="POST">
                <div class="form-group">
                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>

                </div>
                <button type="submit" class="btn">اضافة</button>
            </form>
        </section>
    </article>
    <script src="js/index.js"></script>
</body>

</html>