<div class="row">
<?php
$id = $_SESSION['id'];
$data = date("Y-m-d");
if($_GET["op"]=="participando"){
    $sql = "SELECT * FROM trabalho_evento t "
    ."INNER JOIN controle_servico s ON s.id_c = t.id_evento " 
    ."INNER JOIN cadastro_cliente c ON c.id = s.id_organizador WHERE id_seguranca = '$id' AND trabalhou='Sim' AND s.data >= '$data' ORDER by s.data";
    $result = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==0){
        echo "Você não está participando de nenhum evento no momento.";
    }
    
}else{
    $sql = "SELECT * FROM trabalho_evento t "
    ."INNER JOIN controle_servico s ON s.id_c = t.id_evento " 
    ."INNER JOIN cadastro_cliente c ON c.id = s.id_organizador WHERE id_seguranca = '$id' AND trabalhou='Sim' AND s.data < '$data' ORDER by s.data DESC";
}
$query = $mysqli->query($sql) or die($mysqli->error);

while($exibe = $query->fetch_array()){
?>	
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped">
            <thead>
                </thead>
                    <tbody>
                        <tr><th class="col-md-5 col-xs-5">Código: </th><td><?php echo $exibe["id_c"]; ?></td></tr>  
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
        </tbody>
    </table>
  </div>
        <br/>
<?php 
}
?>
</div>

