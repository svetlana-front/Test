<?php
session_start();
include("db.php");
global $login;
$login = $_POST['login'];
$password = $_POST['password'];
$query = mysqli_query($db, "SELECT * FROM `mentor` WHERE `login`='{$login}' AND `password`='{$password}'AND `rol`=1");
if (mysqli_num_rows($query) == 1) {
    $_SESSION['user'] = ['nick' => $login];

    header("Location: /mentor/user.php");
} else {
    header("Location: /mentor/input.html");
}


