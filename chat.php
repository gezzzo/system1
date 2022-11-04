<?php

session_start();
require_once("dashboard/lib.php");

if (empty($_SESSION["student"])) {
    header("LOCATION:index.php");
}

if (isset($_POST["message"])) {
  $message = $_POST["message"];
  addmessage($_SESSION["student"]['id'],$_GET["supervisorid"],$message,1);

}

if (!empty($_GET)){
  $Chats = ShowChatsSS($_SESSION["student"]['id'],$_GET["supervisorid"]);

}




$Supervisors = ShowChatsSupervisor($_SESSION["student"]['id']);




?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>chat</title>
    <link rel="stylesheet" href="assets/css/chat.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="link">
        <a href="professors.php"><i class="far fa-arrow-alt-circle-left"></i></a>
    </div>
    <div class="chat-container">
        <ul class="chat scroll">
        <?php foreach($Chats as $message) :?>
          <?php if($message["to"] == 1 ) :?>

            <p class="message left bg-primary text-light"><?=$message["message"] ?></p>
            <?php else: ?>

            <p class="message right"><?=$message["message"] ?></p>

            <?php  endif;?>
          
            <?php endforeach; ?>

        </ul>
        <br>
        <br>
        <section class="sendmsg">
          <form action="chat.php?supervisorid=<?= $_GET["supervisorid"] ?>" method="post">
            <input type="text" class="text_input" name="message" placeholder="اكتب رسالتك ..." />
            <input type="submit" value="أرسل" class="btn btn-block bg-primary text-light">
            </form>
        </section>
    </div>
</body>

</html>