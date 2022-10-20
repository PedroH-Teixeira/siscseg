<?php
include  "../conn.php";

  //fetch checkbox array of selected students id
$i = $_POST["i"];
$status = $_POST["status"];
$mudar = $_POST['selecionar'];
 
//process one by one student and delete from student table of mydb database (mysql)
foreach ($mudar as $id) 
{
	$query="UPDATE `cadastro_seguranca` SET status = '$status' WHERE `id`='$id'";
	$result= $mysqli->query($query) or die($mysqli->error);
}

  header("Location: efetivo_seguranca.php?pagina=$i");
 
?>
