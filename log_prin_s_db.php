<?php
include_once "config1.php";
session_start();
///сумма баллов тоько за сегодняшний день из та
$id_user = $_SESSION['id_user'];
$today = date("Y-m-d");
$sql = "SELECT * FROM bally_ch WHERE now_day = '$today' AND id_user = '$id_user'";//создаем запрос к таблице (делаем выборку)
$result = mysqli_query($conn,$sql);//тут получаем результат выборки 
$row_count=mysqli_num_rows($result);//получаем количество записей в таблице фу-я - mysqli_num_rows
if($row_count>0){//если это количество больше нуля
    for ($i=0; $i < $row_count; $i++) { //тогда можем сделать выборку. пока i меньше количества строк
        $row_arr = mysqli_fetch_array($result);//функция позволяе вернуть значение полей из БД
        $kol_ch1 = $row_arr['kol_ch1'];//значения из графы kol_bal
        $kol_m1 = $row_arr['kol_m1'];
        $bali1 = $row_arr['bali1'];
        $sum_kol_ch1+=$kol_ch1;
        $sum_m1+=$kol_m1;
        $sum_bali1+=$bali1;
    }
}
$_SESSION['sum_kol_ch1'] = $sum_kol_ch1;
$_SESSION['sum_m1'] = $sum_m1;
$_SESSION['sum_bali1'] = $sum_bali1;
header("Location:vhod_kab.php");

?>