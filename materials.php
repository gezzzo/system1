<?php

session_start();
require_once("admin/lib.php");

if (empty($_SESSION["student"])) {
    header("LOCATION:index.php");
}
if (empty($_GET["id"])) {
  $materials = Showmaterials();
}else{
  $materials = Showmaterials();
  $materia1o = getmaterial($_GET["id"]);


}



?>



<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>materials</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                            <?= $_SESSION["student"]["name"] ?>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>

                        </ul>
                    </div>
            </div>
            <div class="logo py-2">
                <a href="home.php"><img src="./assets/imgs/logo.jpeg" style="height: 50px;" alt="" /></a>
            </div>
        </div>
    </nav>
    <article class="materials">
        <div>
            <h2>المقررات</h2>
        </div>
        <div class="btn-group d-flex flex-wrap container">

          <?php foreach($materials as $material):?>
              <a href="materials.php?id=<?= $material["id"]?>">
              <button type="button" class="btn clickbtn"><?= $material["name"]?></button>
              </a>
          <?php endforeach;?>
        </div>
        <?php if(!empty($_GET["id"])): ?>
          <div class="container img-cont">
              <img src="admin/images/<?= $materia1o["img"]?>" alt="لم يتم إضافة مقررات بعد" />
          </div>
        <?php endif; ?>

    </article>
    <script src="assets/js/materials.js"></script>
</body>

</html>