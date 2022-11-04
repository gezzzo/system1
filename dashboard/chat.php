<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["supervisor"])) {
    header("LOCATION:../index.php");
}

if (isset($_POST["message"])) {
  
  
  $message = $_POST["message"];
  addmessage($_GET["studentid"],$_SESSION["supervisor"]['id'],$message,0);


}

if (!empty($_GET)){
  $Chats = ShowChatsSS($_GET["studentid"],$_SESSION["supervisor"]['id']);
}

$Students = ShowChatsStudent($_SESSION["supervisor"]['id']);


?>


<!DOCTYPE html>
<html  dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <link rel="stylesheet" href="../assets/css/index.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <section >
        <div class="container py-5">
      
          <div class="row chat-container">
            <div class="col-md-12">
      
              <div class="card card-cont" id="chat3" style="border-radius: 15px;">
                <div class="card-body">
      
                  <div class="row asd">
                    <!-- contacts -->
                    <div class=" contacts col-md-6 col-lg-5 col-xl-4 mb-md-0">
                      <div class="p-3">
                        <div data-mdb-perfect-scrollbar="true">
                          <ul class="list-unstyled mb-0">

                          <?php $arr = [];?>
                          <?php foreach($Students as $Student) :?>
                            
                            <?php if(!in_array($Student["student_id"], $arr) ):?>
                            
                              <li class="p-2 border-bottom">
                              <a href="chat.php?studentid=<?=$Student["student_id"]?>" class="d-flex justify-content-between">
                                <div class="d-flex flex-row">

                                  <div class="pt-1">
                                    <p class="fw-bold mb-0"><?=$Student["student_name"]?></p>
                                  </div>
                                </div>
                              </a>
                            </li>

                            <?php $arr[] =$Student["student_id"] ;?>
                            <?php endif;?>

                            <?php endforeach; ?>
          

                          </ul>
                        </div>
                      </div>
                    </div>

                    <!-- chat -->
                    <?php if (!empty($_GET)): ?>

                    <div class="col-md-6 col-lg-7 col-xl-8">
      
                      <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true">

                        <?php foreach($Chats as $message) :?>
                          <?php if($message["to"] == 1 ) :?>
                          
                            <div class="d-flex flex-row justify-content-start">
                              <div>
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                  <?= $message["message"] ?>
                                </p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted float-end"><?= $message["messagesent"] ?></p>
                              </div>
                            </div>

                          <?php else:?>
          
                            <div class="d-flex flex-row justify-content-end">
                              <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                  <?= $message["message"] ?>
                                </p>
                                <p class="small me-3 mb-3 rounded-3 text-muted"><?= $message["messagesent"] ?></p>
                              </div>
                            </div>

                          <?php endif;?>


                        <?php endforeach; ?>


                      </div>
      
                      <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">

                        <form action="chat.php?studentid=<?= $_GET["studentid"] ?>" method="post">

                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2"
                          placeholder="اكتب رسالتك" name="message">
                        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                        <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>

                        </form>
                      </div>
                    </div>
                    <?php endif;?>

                  </div>
                </div>
              </div>
            </div>
          </div>
      
        </div>
      </section>
    <script src="../dists/js/index.js"></script>
</body>
</html>