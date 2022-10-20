  
<div class="col-md-10 col-md-offset-1">
        <table class="table table-striped">
            <thead>
                </thead>
                    <tbody>
                    <form id="formulario" action="index.php?pg=menu_admin&op=controle&acao=enviar" method="post">
                        <tr><th><label for="organizador">Organizador:</label>
                <select style="width:130px" name="organizador" id="organizador">
		<option></option>
	<?php 
		//Selecione tudo de nomedatabela em ordem crescente pelo nome
                                        
		$consulta = "SELECT razao_social FROM cadastro_cliente order by razao_social";
                $buscar = $mysqli->query($consulta) or die($mysqli->error);
		//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
		while ($dados = $buscar->fetch_array()) {
        ?>
	<option value="<?php echo $dados['razao_social'];?>"><?php echo $dados['razao_social'];?></option>
        <?php
        $razao = $dados['razao_social'];
            }
	?>
                </select></th>
            <th><label for="data1">Data de </label><input type="date" name="data1" id="data1" required/></th>
            <th><label for="data2">até </label><input type="date" name="data2" id="data2" required/></th>
            <th><input type="submit" id="cenviar"value="Exibir"/></th></tr>	
            </form>
       </tbody>
    </table>
  </div>
<br/>
<?php

if(isset($_POST["data1"]) && isset($_POST["data2"])){
$razao = $_POST['organizador'];
$data = $_POST['data1'];
$data2 = $_POST['data2'];

if($razao !=""){
$sql = "SELECT * FROM controle_servico s JOIN cadastro_cliente c ON s.id_organizador = c.id WHERE c.razao_social = '$razao' AND s.data >= '$data' AND s.data <= '$data2' ORDER by data, hora";
$query = $mysqli->query($sql) or die($mysqli->error);
}else{
    $sql = "SELECT * FROM controle_servico s JOIN cadastro_cliente c ON s.id_organizador = c.id WHERE s.data >= '$data' AND s.data <= '$data2' ORDER by data, hora";
$query = $mysqli->query($sql) or die($mysqli->error);
}
while($exibe = $query->fetch_array()){
    $id_evento = $exibe["id_c"];
    $busca_evento = "SELECT id_evento FROM trabalho_evento WHERE id_evento = '$id_evento'";
    $quant_vagas = mysqli_query($mysqli,$busca_evento);
	$count = mysqli_fetch_array($quant_vagas,MYSQLI_ASSOC);
	$vagas = mysqli_num_rows($quant_vagas);
?>	
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped">
            <thead>
                </thead>
                    <tbody>
                        <tr><th class="col-md-5">Código: </th><td><?php echo $exibe["id_c"]; ?></td></tr>  
   <tr><th>Nome do evento: </th><td><?php echo $exibe["nome_evento"]; ?></td></tr>
   <tr><th>Organizador:</th><td><?php echo $exibe["nome_fantasia"];?></td></tr>
   <tr><th>Local:</th><td><?php echo $exibe["endereco_evento"]." N°: ". $exibe["endereco_evento_n"]; ?></td></tr>
    <tr><th></th><td><?php echo $exibe["endereco_evento_bairro"].", ".$exibe["endereco_evento_cidade"]." - ".$exibe["endereco_evento_estado"]; ?>
            </td></tr>
    <tr><th></th><td><?php echo $exibe["end_evento_complemento"];?></td></tr>
   <tr><th>Horário:</th><td><?php echo $exibe["hora"];?></td></tr>
   <tr><th>Data:</th><td><?php echo date('d/m/Y', strtotime($exibe["data"]));?></td></tr>
   <tr><th>Tipo:</th><td><?php echo $exibe["tipo"];?></td></tr>
   <tr><th>Observação:</th><td><?php echo $exibe["observacao"];?></td></tr>
   <tr><th>Vagas disponíveis:</th><td><?php echo $exibe["vagas"]; ?></td></tr>
   <tr><th>Seguranças Inscritos: <?php echo $vagas; ?></th><td>
           <form action="index.php?pg=menu_admin&op=lista" method="post">
               <input type="hidden" name="lista" value="<?php echo $exibe["id_c"]; ?>"/>
               <input id="botao-lista"type="submit" id="lista"value="Lista" class="botao">
           </form></td></tr>
        </tbody>
    </table>
  </div>
        <br/>
<?php 
}
}
?>

