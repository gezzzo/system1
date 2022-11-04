<?php

session_start();
require_once("dashboard/lib.php");

if (empty($_SESSION["student"])) {
    header("LOCATION:home.php");
}

DeleteOrder($_GET['id']);

header("LOCATION:orders.php");