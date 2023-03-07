<?php

include_once "config1.php";

$name_user = filter_var(trim($_POST['name_user']), FILTER_SANITIZE_STRING);//filter_var - ОТфИЛЬТРОВЫВАЕТ HTML символы 
//и не нужные   в бд, вторая часть тип данных, мы фильтруем как обычную строку), trim - удаляет пробелы.
$password_user = filter_var(trim($_POST['password_user']), FILTER_SANITIZE_STRING);
$password_user = md5($password_user."dvsdc232");//создает хеш из строки(шифрует пароль)

$sql = mysqli_query($conn, "SELECT * FROM users WHERE name_user	= '$name_user' AND password_user = '$password_user'");//создаем запрос
$user = $sql->fetch_assoc();
session_start(); $id_user = $user['id_user']; $_SESSION['id_user'] = $id_user;

if(count($user) == 0){
    header('Location: vhod_kab.php');
    exit();
}


setcookie('user', $user['name_user'], time() + 3600, "/");

$conn->close();
header('Location: vhod_kab.php');

?>