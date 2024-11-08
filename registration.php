<?php

session_start();

include("db.php");

if (isset($_SESSION['user'])) {
//   echo("Вы вошли как " . $_SESSION['user']['nick']);
    $login = $_SESSION['user']['nick'];

    /*header("Location: /mentor/mentor.html");*/
}

$logi = $_POST['login'];
$password = $_POST['password'];


$query = mysqli_query($db, "SELECT * FROM `mentor` WHERE `login`='{$logi}'");

if (mysqli_num_rows($query) == 0) {

    mysqli_query($db, "INSERT INTO `mentor` ( `login`, `password`,`rol`,`ychet`) VALUES   ('{$logi}', '{$password}', '0', $login)");

    header("Location: mentor.html");
} else {
    echo("Ошибка: Данный логин занят другим пользователем.");
}
