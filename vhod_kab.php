

</html>
<!DOCTYPE HTML  lang="en">
<html>
 <head>
  <title>form</title>
  <meta charset="utf-8">
  <style>
    
  </style>
  <link rel="stylesheet" type="text/css" href="">
  
 </head>
 <body> 
    <?php if ($_COOKIE['user'] == ''):?> 
    <form class="subform" name ="sms" method="post"  action="vhod.php" >
      <h1>Вход</h1>  
      <label >name</label>
      <input type="text" name="name_user"> 
      <label >password</label>
      <input type="text" name="password_user">
      <input type="submit"  value="Отправить">
    </form>
    <button><a href="glav_v_b_ch.php"><h3>Главная</h3></a></button>
    <?php else:?>
        <p><button><a href = 'vhod_kab.php'><?=$_COOKIE['user']?></a></button> <button><a href = 'exit.php'>Выход</a></button></p> 
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
      echo 'сумма часов - '.$sum_kol_ch1.' сумма минут - '.$sum_m1.' сумма баллов - '.$sum_bali1.'<br>';
    ?> 

    <button><a href="v_b_ch.html"><h3>Ввод баллов и времени</h3></a></button>
    <button><a href="glav_v_b_ch.php"><h3>Главная</h3></a></button>
    <?php endif;?> 
</body> 
</html>
