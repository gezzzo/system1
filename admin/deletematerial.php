<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}

deletematerial($_GET['id']);

header("LOCATION:materials.php");

