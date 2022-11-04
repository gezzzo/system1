<?php

session_start();
require_once("dashboard/lib.php");

if (empty($_SESSION["student"])) {
    header("LOCATION:index.php");
}

if (isset($_POST["course_name"]) && $_POST["submit"] == "إضافة") {
  $course_name = $_POST["course_name"];
  $course_hours = $_POST["course_hours"];
  $course_id = $_POST["course_id"];
  $student_id = $_SESSION["student"]["id"];

  $errors = [];
  if (empty($_POST["course_name"])){
      $errors[]="The email is required";
  }
  if (empty($_POST["course_hours"])){
      $errors[]="The password is required";
  }
  if (empty($_POST["course_id"])){
      $errors[]="The name is required";
  }


  if (empty($errors)){
  
      if (addorder($course_name,$course_id,$course_hours,$student_id)) {
        header("LOCATION:orders.php");

      }
  
  }
}
elseif(isset($_POST["order_id"]) && $_POST["submit"] == "حذف" ){

  $order =  order($_POST["order_id"]);
  $order_status = $order["order_status"];
  if ($order_status == "حذف" || $order_status == "معارضة" || $order_status == "قيد الانتظار") {    
    $order =  DeleteOrder($order["id"]);
  }
  else{
    addorder($order["course_name"],$order["course_id"],$order["course_hours"],$_SESSION["student"]["id"],"حذف");
  }

}


elseif(isset($_POST["course_name"]) && $_POST["submit"] == "حذف" ){


    addorder($_POST["course_name"],$_POST["course_id"],$_POST["course_hours"],$_SESSION["student"]["id"],"حذف");

}


$Orders = ShowOrderStudent($_SESSION["student"]["id"]);




?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الطلبات</title>
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
    <article class="talabat">
        <div>
            <h2>الطلبات</h2>
            <h4 data-bs-toggle="modal" data-bs-target="#myModal"><i class="	fas fa-plus-circle"></i></h4>
        </div>
        <div class="container">
            <!-- <a href="addorder.php">اضافة طلب</a> -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>اسم المقرر</th>
                        <th>نوع الطلب</th>
                        <th>حالة الطلب</th>
                        <th>حذف الطلب</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($Orders as $Order): ?>

                    <tr>
                      <td><?= $Order["course_name"] ?></td>
                      <td><?= $Order["order_type"] ?></td>
                      <td><?= $Order["order_status"] ?></td>
                      <td>
                        <form action="orders.php" method="post">       
                          <input type="hidden" name="order_id" value="<?= $Order["id"] ?>" >               
                          <input type="submit" class="btn btn-danger" value="حذف" name="submit">
                        </form>  
                      </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </article>
    
      <!-- Modal content-->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <form action="orders.php" method="post">
            <!-- Modal body -->
            <div class="modal-body">
              <section>
                <p>اسم الطالب</p>
                <input type="text" class="d-block form-control" placeholder="<?= $_SESSION["student"]["name"] ?>" disabled>
              </section>
              <section>
                <p>اسم المقرر</p>
                <input type="text" name="course_name" class="d-block form-control" placeholder="اسم المقرر" >
              </section>
              <section>
                <p>رمز المقرر</p>
                <input type="text" name="course_id"  class="d-block form-control" placeholder="رمز المقرر" >
              </section>
              <section>
                <p>عدد الساعات</p>
                <input type="text" name="course_hours"  class="d-block form-control" placeholder="عدد الساعات" >
              </section>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              
              <input type="submit" class="btn btn-primary" value="إضافة" name="submit">
              <input type="submit" class="btn btn-danger" value="حذف" name="submit">
            </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</body>

</html>