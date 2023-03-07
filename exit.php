<?php
setcookie('user', $user['name'], time() - 3700, "/");
header('Location: vhod_kab.php');
?>