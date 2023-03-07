<?php
include_once "config1.php";

$name_user = filter_var(trim($_POST['name_user']), FILTER_SANITIZE_STRING);//filter_var - ОТфИЛЬТРОВЫВАЕТ HTML символы 
//и не нужные   в бд, вторая часть тип данных, мы фильтруем как обычную строку), trim - удаляет пробелы.
$password_user = filter_var(trim($_POST['password_user']), FILTER_SANITIZE_STRING);
$password_user = md5($password_user."dvsdc232");//создает хеш из строки(шифрует пароль)

$sql = "INSERT Into users(name_user, password_user)
        VALUES  ('$name_user', '$password_user')";

if ($conn->query($sql) === TRUE){
    
    header("Location:vhod_kab.php");
} else{
    echo "error".$conn->error;
}

