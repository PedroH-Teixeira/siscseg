<?php
include "conn.php";

if(isset($_GET['q'])){
$q=strtolower ($_GET["q"]);
$sql = "SELECT nome,sobrenome FROM cadastro_seguranca WHERE nome like '%" . $q . "%' OR sobrenome like '%" . $q . "%'";
$query = $mysqli->query($sql) or die($mysqli->error);
while($reg = $query->fetch_array()){

	//if (srtpos(strtolower($reg['nom_lista']),$q !== false){
		echo ($reg["nome"]." ".$reg["sobrenome"]."\n");
//	}
}
}
?>