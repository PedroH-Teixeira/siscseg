<?php 

$host = "mysql.hostinger.com.br";
$usuario = "u562284733_root";
$senha = "AdM!123";
$bd = "u562284733_banco";

$mysqli = new mysqli($host ,$usuario ,$senha,$bd);

if ($mysqli->connect_errno) {
    echo "Falha na conexão: (".$mysqli->connect_errno.")".$mysqli_error;
}
mysqli_set_charset($mysqli,'utf8');
 ?>
