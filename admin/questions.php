<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}



$questions = Showquestions();




?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الاسئلةالشائعة</title>
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
    
    <article class="talabat">
        <div>
            <h2>الاسئلةالشائعة</h2>
        </div>
        <div class="container">
            <a href="addquestion.php" class="btn btn-primary text-light mb-3">اضافة سؤال</a>
            <a href="qn.php" class="btn btn-primary text-light mb-3">الأسئلة</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>السؤال</th>
                        <th>الاجابة</th>
                        <th>تعديل</th>
                        <th>حذف </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($questions as $question): ?>

                    <tr>
                      <td><?= $question["answer"] ?></td>
                      <td><?= $question["question"] ?></td>
                      <td>
                        <a href="updatequestion.php?id=<?= $question["id"] ?>" class="btn btn-warning">تعديل</a>
                      <td>
                        <a href="deletequestion.php?id=<?= $question["id"] ?>" class="btn btn-danger">حذف</a>
                      </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </article>
    
     
    </div>
  </div>
</body>

</html>
