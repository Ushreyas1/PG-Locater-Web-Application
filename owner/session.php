<?php

session_start();

if (!isset($_SESSION['owner_id']) || !isset($_SESSION['owner_name']) || !$_SESSION['login'] == true) {
    header("location: login.php?error=Please login!");
    die();
}