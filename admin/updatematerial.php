<?php
session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}



if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $imgold = $_POST["imgold"];
    $id = $_POST["id"];
    $temp = $_FILES["img"]["tmp_name"];
    $img = $_FILES["img"]["name"];
    move_uploaded_file($temp,"images/".$img);

    $errors = [];
    if (empty($_POST["name"])){
        $errors[]="The failed is required";
    }


    

    if (empty($errors)){
        if (empty($img)) {
        
            editmaterial($id,$name,$imgold);
            header("LOCATION:materials.php");

        }else{
            editmaterial($id,$name,$img);
            header("LOCATION:materials.php");
        }

    
    }

}
else{
    $material = getmaterial($_GET["id"]);

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
            <h1>اضافة مقرر</h1>
        </div>
        <section class="login-card" id="regcard">
            <form action="updatematerial.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                    <input type="hidden" name="imgold" value="<?= $material["img"] ?>">
                    <input type="text" class="form-control" placeholder="مرحلة المقرر" name="name" value="<?= $material["name"] ?>" />
                    Img:
                    <br>
                    <img src="images/<?= $material["img"] ?>" alt="" height="200px" width="300px">
                    <br>
                    <input type="file" name="img" class="custom-file-input" id="customFile">
                </div>
                <button type="submit" class="btn">اضافة</button>
            </form>
        </section>
    </article>
    <script src="js/index.js"></script>
</body>

</html>