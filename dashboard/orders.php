<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["supervisor"])) {
    header("LOCATION:index.php");
}

if (isset($_POST["ans"])) {
  $ans = "مقبول";
  $order_id = $_POST["order_id"];

  if (empty($errors)){
  
      if (updateorder($ans,$order_id)) {
        header("LOCATION:orders.php");

      }
  
  }

}
elseif(isset($_POST["warning"])) {
  $ans = "معارضة";
  $order_id = $_POST["order_id"];

  if (empty($errors)){

      if (updateorder($ans,$order_id)) {
        header("LOCATION:orders.php");
      }
  
  }

}

elseif (isset($_POST["rejected"])) {
  $ans = "رفض";
  $order_id = $_POST["order_id"];

  if (empty($errors)){
  
      if (updateorder($ans,$order_id)) {
        header("LOCATION:orders.php");

      }
  
  }

}



$Orders = ShowOrders();




?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الطلبات</title>
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
    <article class="talabat">
        <div>
            <h2>الطلبات</h2>
        </div>
        <div class="container">
            <!-- <a href="addorder.php">اضافة طلب</a> -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>اسم الطالب</th>
                        <th>اسم المقرر</th>
                        <th>نوع الطلب</th>
                        <th>حالة الطلب</th>
                        <th>الرد علي الطلب</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($Orders as $Order): ?>

                    <tr>
                      <td><?= $Order["student_name"] ?></td>
                      <td><?= $Order["course_name"] ?></td>
                      <td><?= $Order["order_type"] ?></td>
                      <td><?= $Order["order_status"] ?></td>
                      <td>
                        <form action="orders.php" method="post">
                        <input type="hidden" value="<?= $Order["order_id"] ?>" name="order_id">

                          <input type="submit" class="btn btn-primary" value="قبول" name="ans">
                          <input type="submit" class="btn btn-warning" value="معارضة" name="warning">
                          <input type="submit" class="btn btn-danger" value="رفض" name="rejected">

                        </form>
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