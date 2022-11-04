<?php

session_start();
require_once("../dashboard/lib.php");


if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}

$professors = Showprofessors();




?>



<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>المرشد الأكاديمي</title>
    <link rel="stylesheet" href="../assets/css/index.css" />
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
    <article class="professor">
        <div>
            <h2>المرشد الأكاديمي</h2>
        </div>
        <div class="container">
        <?php foreach( $professors as $professor ):?>

            <section>
                    <i class="fas fa-angle-left"></i>
                    <p><?= $professor["name"]?></p>
                    <a href="chat.php?supervisorid=<?= $professor["id"]?>"><i class="fas fa-comment-alt"></i></a>

            </section>
            <?php endforeach; ?>

        </div>
    </article>
</body>

</html>