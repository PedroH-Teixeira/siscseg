<?php
//Excluir Eventos
if(isset($_POST['selecionar'])){
  //fetch checkbox array of selected students id
$delete = $_POST['selecionar'];
 
//process one by one student and delete from student table of mydb database (mysql)
foreach ($delete as $id) 
{
	$query="DELETE FROM `controle_servico` where `controle_servico`.`id_c`='$id'";
	$result= $mysqli->query($query) or die($mysqli->error);
}
}
//Excluir fotos
if($_GET["op"]=="editar_cadastro" || $_GET["op"]=="seguranca" && isset($_POST['foto_atual'])){
   $id_usuario = $_POST['usuario'];
   
        $nome_foto="SELECT foto FROM cadastro_seguranca WHERE id ='$id_usuario' LIMIT 1";
        $foto = mysqli_query($mysqli,$nome_foto);
        $del_foto = mysqli_fetch_array($foto,MYSQLI_ASSOC);
        
        $caminho_foto = $fotosDel = "imagens/foto/".$del_foto['foto'];
        unlink($caminho_foto);
   if($caminho_foto!="imagens/foto/"){
        $query="UPDATE `cadastro_seguranca` SET foto='' WHERE id ='$id_usuario'";
	$result= $mysqli->query($query) or die($mysqli->error);
   }
}
//Excluir noticias
if(isset($_POST["acao"])=="remover_noticia"){
        $id = $_POST["remover_noticia"];
        $query="DELETE FROM noticias where id_noticias='$id'";
	$result= $mysqli->query($query) or die($mysqli->error);
        
}
?>