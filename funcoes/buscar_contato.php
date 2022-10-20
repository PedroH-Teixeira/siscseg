
<?php
$nome = strtolower ($_POST["buscar"]);
$sql = "SELECT * FROM cadastro_seguranca WHERE nome LIKE '%".$nome."%' ORDER by nome";
$query = $mysqli->query($sql) or die($mysqli->error);
while($exibe = $query->fetch_array()){
    
?>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      </thead>
      <tbody>
          <tr><th class="col-md-5">Código: </th><td colspan="2"><?php echo $exibe["id"]; ?></td></tr>
                                <tr><th></th><td id="foto" colspan="2"><img src="imagens/foto/<?php echo $exibe["foto"]; ?>" id="previsualizar" class="previsualizar"><!--//imprime a foto na tela--></br></td></tr>
                                <tr><th>Nome Completo: </th><td colspan="2"><?php echo $exibe["nome"];?></td></tr>
                                <tr><th>Nome do Pai: </th><td colspan="2"><?php echo $exibe["nomepai"]; ?></td></tr>
                                <tr><th>Nome da Mãe: </th><td colspan="2"><?php echo $exibe["nomemae"]; ?></td></tr>
				<tr><th>RG: </th><td colspan="2"><?php echo $exibe["rg"]; ?></td></tr>
				<tr><th>CPF: </th><td colspan="2"><?php echo $exibe["cpf"]; ?></td></tr>
				<tr><th>Telefone: </th><td colspan="2"><?php echo $exibe["telefone"]; ?></td></tr>
				<tr><th>E-mail: </th><td colspan="2"><?php echo $exibe["email"]; ?></td></tr>
				<tr><th>Endereço: </th><td colspan="2"><?php echo $exibe["endereco"]." N°: ".$exibe["endereco_n"]; ?></td></tr>
                                <tr><th></th><td colspan="2"><?php echo $exibe["endereco_bairro"]."<br>".$exibe["endereco_cidade"]." - ".$exibe["endereco_estado"]; ?></td></tr>
                                <tr><th>Data de Nascimento: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($exibe["data_nasci"])); ?></td></tr>
				<tr><th>Data Vigilante: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($exibe["datav"])); ?></td></tr>
				<tr><th>Data Reciclagem: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($exibe["datar"])); ?></td></tr>
				<tr><th>Curso: </th><td colspan="2"><?php echo $exibe["curso"]; ?></td></tr>
				<tr><th>Experiências Profissionais: </th><td colspan="2"><?php echo $exibe["experiencia"]; ?></td></tr>
                                <tr><th>Status: </th><td colspan="2"><?php echo $exibe["status"]; ?></td></tr>
                                </tbody>
    </table>
  </div>
 </div>   
</div>
<?php
  }
  $cliente = strtolower ($_POST["buscar"]);
$sql = "SELECT * FROM cadastro_cliente WHERE nome_fantasia LIKE '%".$cliente."%' ORDER by nome_fantasia";
$query = $mysqli->query($sql) or die($mysqli->error);
while($exibe = $query->fetch_array()){
?>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="table-responsive">
             <table class="table table-striped">
                <thead>
                  </thead>
                      <tbody>
                          <tr><th class="col-md-5">Cód. Identificador: </th><td><?php echo $exibe["id"]; ?></td></tr>
                                <tr><th>Razão Fantasia: </th><td><?php echo $exibe["nome_fantasia"]; ?></td></tr>
                                <tr><th>Razão Social: </th><td><?php echo $exibe["razao_social"]; ?></td></tr>
                                <tr><th>CNPJ: </th><td><?php echo $exibe["cnpj"]; ?></td></tr>
                                <tr><th>Email: </th><td><?php echo $exibe["email"]; ?></td></tr>
				<tr><th>Telefone: </th><td><?php echo $exibe["telefone"]; ?></td></tr>
				<tr><th>Endereço: </th><td><?php echo $exibe["endereco"]." N°: ". $exibe["endereco_n"]; ?></td></tr>
                                <tr><th></th><td><?php echo $exibe["endereco_bairro"]."<br>".$exibe["endereco_cidade"]." - ".$exibe["endereco_estado"]; ?>
                                        </td></tr>
				<tr><th>Nome do Responsável: </th><td><?php echo $exibe["nome_responsavel"]; ?></td></tr>
				<tr><th>Cargo: </th><td><?php echo $exibe["cargo"]; ?></td></tr>
				<tr><th>CPF: </th><td><?php echo $exibe["cpf"]; ?></td></tr>
				<tr><th>RG: </th><td><?php echo $exibe["rg"]; ?></td></tr>
				<tr><th>E-mail: </th><td><?php echo $exibe["email_responsavel"]; ?></td></tr>
				<tr><th>CEP: </th><td><?php echo $exibe["cep"]; ?></td></tr>
				<tr><th>Endereço Residêncial: </th><td><?php echo $exibe["end_responsavel"]." N°: ". $exibe["end_responsavel_n"]; ?></td></tr>
                                <tr><th></th><td><?php echo $exibe["end_responsavel_bairro"]."<br>".$exibe["end_responsavel_cidade"]." - ".$exibe["end_responsavel_estado"]; ?>
                                        </td></tr>
                                
                    </tbody>
            </table>
        </div>
    </div>
</div>

<?php
  }
?>