
<form id="formstatus" action="status.php" name="formstatus" method="post">
 <div class="container">
            <input type="submit" name="status"value="Liberado">
            <input type="submit" name="status"value="Bloqueado">
            <br>
<?php
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$sql = "SELECT * FROM cadastro_seguranca ORDER by id DESC";
$query = $mysqli->query($sql) or die($mysqli->error);
$total = mysqli_num_rows($query);
$registros = 5;
$numPaginas = ceil($total/$registros); 
$inicio = ($registros*$pagina)-$registros;
$sql = "SELECT * FROM cadastro_seguranca ORDER by id DESC limit $inicio,$registros";
$query = $mysqli->query($sql) or die($mysqli->error);
$total = mysqli_num_rows($query);

while($exibe = $query->fetch_array()){
    
?>
 
 <div class="col-md-8 col-md-offset-2">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      </thead>
      <tbody>
<tr><td colspan="3"><input type="checkbox" name="selecionar[]" id="selecionar[]" value="<?php echo $exibe["id"]; ?>" /></td></tr></form>

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
				<tr><th>Data de realização do curso de vigilante:: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($exibe["datav"])); ?></td></tr>
				<tr><th>Data Reciclagem: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($exibe["datar"])); ?></td></tr>
				<tr><th>Curso: </th><td colspan="2"><?php echo $exibe["curso"]; ?></td></tr>
				<tr><th>Experiências Profissionais: </th><td colspan="2"><?php echo $exibe["experiencia"]; ?></td></tr>
                                <tr><th>Status: </th><td colspan="2"><?php echo $exibe["status"]; ?></td></tr>
                                </tbody>
    </table>
  </div>
 </div>   
</div> 
    <div class="container">
<?php
  }
  for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<a href='index.php?pg=menu_admin&op=lista_efetivo&pagina=$i'>".$i."</a> "; 
    }
?>
    <input type="hidden" name="i" value="<?php echo $pagina; ?>">
      </div>    