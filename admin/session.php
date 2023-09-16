<?php

session_start();

if (!isset($_SESSION['admin']) || !$_SESSION['login'] == true) {
    header("location: login.php?error=Please login!");
    die();
}