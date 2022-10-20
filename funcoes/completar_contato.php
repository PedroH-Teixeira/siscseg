<?php
include "../conn.php";

if(isset($_GET['q'])){
$q=strtolower ($_GET["q"]);
$sql = "SELECT nome FROM cadastro_seguranca WHERE nome like '%" . $q . "%'";
$query = $mysqli->query($sql) or die($mysqli->error);
while($reg = $query->fetch_array()){

	//if (srtpos(strtolower($reg['nom_lista']),$q !== false){
		echo ($reg["nome"]."\n");
//	}
}
}
if(isset($_GET['q'])){
$q=strtolower ($_GET["q"]);
$sql = "SELECT nome_fantasia FROM cadastro_cliente WHERE nome_fantasia like '%" . $q . "%'";
$query = $mysqli->query($sql) or die($mysqli->error);
while($reg = $query->fetch_array()){

	//if (srtpos(strtolower($reg['nom_lista']),$q !== false){
		echo ($reg["nome_fantasia"]."\n");
//	}
}
}
?>