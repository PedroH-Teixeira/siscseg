
<?php
// Recuperamos os valores dos campos através do método POST
$cnpj = $_POST['cnpj'];
$organizador = $_POST['razao_social'];
$nome_evento = $_POST['nome_evento'];
$vagas = $_POST['vagas'];
$endereco_evento = $_POST['endereco_evento'];
$endereco_evento_n = $_POST['endereco_evento_n'];
$endereco_evento_bairro = $_POST['endereco_evento_bairro'];
$endereco_evento_cidade = $_POST['endereco_evento_cidade'];
$endereco_evento_estado = $_POST['endereco_evento_estado'];
$end_evento_complemento = $_POST["end_evento_complemento"];
$hora = $_POST['hora'];
$data = $_POST['data'];
$tipo = $_POST['tipo'];
$observacao = $_POST['observacao'];

        $sql_query = "SELECT * FROM cadastro_cliente WHERE cnpj = '$cnpj'";
	$result = mysqli_query($mysqli,$sql_query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
        if($count == 1)
	{
$seleciona_id = "SELECT id FROM cadastro_cliente WHERE cnpj = '$cnpj'";
$id =  $mysqli->query($seleciona_id) or die($mysqli->error);
while($exibe_id = $id->fetch_array()){
$id_organizador = $exibe_id["id"];
}
if($_POST['acao']=="inserir"){
$inserir = $mysqli->query("INSERT INTO `controle_servico`(`id_organizador`,`nome_evento`, `vagas`, `endereco_evento`,endereco_evento_n,endereco_evento_bairro,endereco_evento_cidade,endereco_evento_estado,end_evento_complemento,`hora`, `data`, `tipo`, `observacao`) VALUES ('$id_organizador','$nome_evento','$vagas','$endereco_evento','$endereco_evento_n','$endereco_evento_bairro','$endereco_evento_cidade','$endereco_evento_estado','$end_evento_complemento','$hora','$data','$tipo','$observacao')");
if($inserir){
    $mysqli->close(); //Fecha a execução da query
} else {
    echo 'Erro: ', $mysqli->error;//Exibe o erro
}
}
if($_POST['acao']=="editar"){
    $id_evento = $_POST["id"];
    $editar = mysqli_query($mysqli, "UPDATE controle_servico SET id_organizador='$id_organizador',nome_evento='$nome_evento',vagas='$vagas',endereco_evento='$endereco_evento',endereco_evento_n='$endereco_evento_n',endereco_evento_bairro='$endereco_evento_bairro',endereco_evento_cidade='$endereco_evento_cidade',endereco_evento_estado='$endereco_evento_estado',end_evento_complemento='$end_evento_complemento',hora='$hora',data='$data',tipo='$tipo',observacao='$observacao' WHERE id_c = '$id_evento'");
}
?>
<div class="container">
<h2>Enviado com sucesso!</h2></br>
    <div class="col-md-10 col-md-offset-1">
         <div class="table-responsive">
             <table class="table table-striped">
                <thead>
                  </thead>
                      <tbody>

                                <tr><th>CNPJ: </th><td><?php echo $cnpj; ?></td></tr>
                                <tr><th>Organizador: </th><td><?php echo $organizador; ?></td></tr>
				<tr><th>Nome do Evento: </th><td><?php echo $nome_evento; ?></td></tr>
                                <tr><th>Quantidade de Vagas: </th><td><?php echo $vagas; ?></td></tr>
				<tr><th>Endereço: </th><td><?php echo $endereco_evento." N°: ". $endereco_evento_n; ?></td></tr>
                                <tr><th></th><td><?php echo $endereco_evento_bairro.", ".$endereco_evento_cidade." - ".$endereco_evento_estado; ?>
                                        </td></tr>
                                <tr><th></th><td><?php echo $end_evento_complemento;?></td></tr>
				<tr><th>Horário: </th><td><?php echo $hora; ?></td></tr>
				<tr><th>Data: </th><td><?php echo date('d/m/Y', strtotime($data)); ?></td></tr>
				<tr><th>Tipo: </th><td><?php echo $tipo; ?></td></tr>
				<tr><th>Observação: </th><td><?php echo $observacao; ?></td></tr>
                                
                   </tbody>
            </table>
        </div>
    </div>
</div>

    <form>
        <input type="hidden" name="pg" value="menu_admin">
        <button type="submit" name="op" value="eventos" id="botao-ok" class="botao">OK</button>
    </form>
<?php
        }
        else
	{
	echo "O CNPJ do Organizador foi inserido incorretamente ou não existe.<br/>";
        echo "O mesmo deve ser informado no formato: 00.000.000/0000-00<br/>";
        echo "Caso o CNPJ informado esteja correto, certifique-se de que o mesmo foi cadastrado.";
	}
?>