<div class="container">
<?php
// Recuperamos os valores dos campos através do método POST

$nome_fantasia = $_POST['nome_fantasia'];
$razao_social = $_POST['razao'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$endereco_n = $_POST['endereco_n'];
$endereco_bairro = $_POST['endereco_bairro'];
$endereco_cidade = $_POST['endereco_cidade'];
$endereco_estado = $_POST['endereco_estado'];
$end_complemento = $_POST["end_complemento"];
$nome_responsavel = $_POST['nome_responsavel'];
$cargo = $_POST['cargo'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$email_responsavel = $_POST['email_responsavel'];
$cep = $_POST['cep'];
$end_responsavel = $_POST['end_responsavel'];
$end_responsavel_n = $_POST['end_responsavel_n'];
$end_responsavel_bairro = $_POST['end_responsavel_bairro'];
$end_responsavel_cidade = $_POST['end_responsavel_cidade'];
$end_responsavel_estado = $_POST['end_responsavel_estado'];
$end_resp_complemento = $_POST["end_resp_complemento"];

if($_POST['acao']=="inserir"){
$inserir = $mysqli->query("INSERT INTO cadastro_cliente (nome_fantasia,razao_social, cnpj, email, telefone, endereco, endereco_n,endereco_bairro,endereco_cidade,endereco_estado,end_complemento, nome_responsavel, cargo, cpf, rg, email_responsavel, cep, end_responsavel,end_responsavel_n,end_responsavel_bairro,end_responsavel_cidade,end_responsavel_estado,end_resp_complemento) values ('$nome_fantasia','$razao_social','$cnpj','$email','$telefone','$endereco','$endereco_n','$endereco_bairro','$endereco_cidade','$endereco_estado','$end_complemento','$nome_responsavel','$cargo','$cpf','$rg','$email_responsavel','$cep','$end_responsavel','$end_responsavel_n','$end_responsavel_bairro','$end_responsavel_cidade','$end_responsavel_estado','$end_resp_complemento')");
if($inserir){
    $mysqli->close(); //Fecha a execução da query
} else {
    echo 'Erro: ', $mysqli->error;//Exibe o erro
}
}
if($_POST['acao']=="editar"){
    $id_cliente = $_POST["id"];
    $editar = mysqli_query($mysqli, "UPDATE cadastro_cliente SET nome_fantasia='$nome_fantasia',razao_social='$razao_social',cnpj='$cnpj',email='$email',telefone='$telefone',endereco='$endereco',endereco_n='$endereco_n',endereco_bairro='$endereco_bairro',endereco_cidade='$endereco_cidade',endereco_estado='$endereco_estado',end_complemento='$end_complemento',nome_responsavel='$nome_responsavel',cargo='$cargo',cpf='$cpf',rg='$rg',email_responsavel='$email_responsavel',cep='$cep',end_responsavel='$end_responsavel',end_responsavel_n='$end_responsavel_n',end_responsavel_bairro='$end_responsavel_bairro',end_responsavel_cidade='$end_responsavel_cidade',end_responsavel_estado='$end_responsavel_estado',end_resp_complemento='$end_resp_complemento' WHERE id = '$id_cliente'");
}
?>

                                <h2>Enviado com sucesso!</h2></br>
                                
    <div class="col-md-8 col-md-offset-2">
         <div class="table-responsive">
             <table class="table table-striped">
                <thead>
                  </thead>
                      <tbody>
                                <tr><th>Razão Fantasia: </th><td><?php echo $nome_fantasia; ?></td></tr>
                                <tr><th>Razão Social: </th><td><?php echo $razao_social; ?></td></tr>
                                <tr><th>CNPJ: </th><td><?php echo $cnpj; ?></td></tr>
                                <tr><th>Email: </th><td><?php echo $email; ?></td></tr>
				<tr><th>Telefone: </th><td><?php echo $telefone; ?></td></tr>
				<tr><th>Endereço: </th><td><?php echo $endereco." N°: ". $endereco_n; ?></td></tr>
                                <tr><th></th><td><?php echo $endereco_bairro.", ".$endereco_cidade." - ".$endereco_estado; ?>
                                        </td></tr>
                                <tr><th></th><td><?php echo $end_complemento; ?></td></tr>
				<tr><th>Nome do Responsável: </th><td><?php echo $nome_responsavel; ?></td></tr>
				<tr><th>Cargo: </th><td><?php echo $cargo; ?></td></tr>
				<tr><th>CPF: </th><td><?php echo $cpf; ?></td></tr>
				<tr><th>RG: </th><td><?php echo $rg; ?></td></tr>
				<tr><th>E-mail: </th><td><?php echo $email_responsavel; ?></td></tr>
				<tr><th>CEP: </th><td><?php echo $cep; ?></td></tr>
				<tr><th>Endereço Residêncial: </th><td><?php echo $end_responsavel." N°: ". $end_responsavel_n; ?></td></tr>
                                <tr><th></th><td><?php echo $end_responsavel_bairro.", ".$end_responsavel_cidade." - ".$end_responsavel_estado; ?>
                                        </td></tr>
                                <tr><th></th><td><?php echo $end_resp_complemento; ?></td></tr>
                                
                    </tbody>
            </table>
        </div>
    </div>
</div>
    <form>
        <input type="hidden" name="pg" value="menu_admin">
        <button type="submit" name="op" value="eventos" id="botao-ok" class="botao">OK</button>
    </form>