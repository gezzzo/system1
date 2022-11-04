<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}

deletestudent($_GET['id']);

header("LOCATION:students.php");

