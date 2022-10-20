<?php
include "../conn.php";

if(isset($_GET['q'])){
$q=strtolower ($_GET["q"]);
$sql = "SELECT cnpj FROM cadastro_cliente WHERE cnpj like '%" . $q . "%'";
$query = $mysqli->query($sql) or die($mysqli->error);
while($reg = $query->fetch_array()){

	//if (srtpos(strtolower($reg['nom_lista']),$q !== false){
		echo ($reg["cnpj"]."\n");
//	}
}
}
function retorna($cnpj, $mysqli){
	$result_razao = "SELECT * FROM cadastro_cliente WHERE cnpj = '$cnpj' LIMIT 1";
	$resultado_razao = mysqli_query($mysqli, $result_razao);
	if($resultado_razao->num_rows){
		$row_razao = mysqli_fetch_assoc($resultado_razao);
		$valores['razao_social'] = $row_razao['nome_fantasia'];
	}else{
		$valores['razao_social'] = '';
	}
	return json_encode($valores);
}

if(isset($_GET['cnpj'])){
	echo retorna($_GET['cnpj'], $mysqli);
}
?>