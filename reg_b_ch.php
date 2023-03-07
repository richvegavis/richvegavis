<?php
// include_once "vhod.php";
include_once "config1.php";


session_start(); $id_user = $_SESSION['id_user'];

$kol_ch1 = $_POST['kol_ch1'];
$kol_m1 = $_POST['kol_m1'];
$bali1 = $_POST['bali1'];

$sql = "INSERT Into bally_ch(id_user, kol_ch1, kol_m1, bali1, now_day)
        VALUES  ('$id_user', '$kol_ch1', '$kol_m1', '$bali1',  CURDATE())";

if ($conn->query($sql) === TRUE){
    
    header("Location:log_prin_s_db.php");
} else{
    echo "error".$conn->error;
}



?>