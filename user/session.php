<?php

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || !$_SESSION['login'] == true) {
    header("location: login.php?error=Please login!");
    die();
}