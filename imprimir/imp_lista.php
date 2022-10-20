<body onload="self.print();self.close();">
<script type="text/javascript"><!--	print();--></script>
<div class="row"> 
    
<?php
//Impressão da lista de trabalhadores no evento
if($_GET["acao"]=="lista"){
$lista = $_GET['imprimir'];

$selecionar_evento = "SELECT * FROM trabalho_evento e JOIN controle_servico s ON e.id_evento = s.id_c"
        . " JOIN cadastro_seguranca c ON e.id_seguranca = c.id WHERE id_evento = '$lista' AND trabalhou='Sim'";
$evento = $mysqli->query($selecionar_evento) or die($mysqli->error);
$evento2 = $mysqli->query($selecionar_evento) or die($mysqli->error);
$evento_nome = $evento2->fetch_array();
$i=0;
?>
<!-- Inicio impressão de tela da lista de trabalhadores no evento -->
<div class="col-md-12">   
    <h2>Evento: <?php echo $evento_nome["nome_evento"]; ?></h2> 
    <div class="tabelaimpressao">
                              <div class="table-responsive">
                                  <table id="impressao" class="table table-striped ">
                                 <thead>
                                     <tr>
                                         <th>Nº</th>
                                         <th>Código</th>
                                         <th>Nome</th>
                                         <th>CPF</th>
                                         <th>E-mail</th>
                                         <th>CGE</th>
                                         <th>Telefone</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                          
    
<?php
while($exibe_evento = $evento->fetch_array()){
    $i++;
?>
     <tr>
      <th><?php echo $i;?></th>
      <th><?php echo $exibe_evento["id"];?></th>
      <td><?php echo $exibe_evento["nome"];?></td>
      <td><?php echo $exibe_evento["cpf"];?></td>
      <td><?php echo $exibe_evento["email"];?></td>
      <td><?php echo $exibe_evento["curso"];?></td>
      <td><?php echo $exibe_evento["telefone"];?></td>
    <?php                       
      }
      ?>
     </tr>
    </tbody>
                                </table>
                              </div>
                             </div>    
                            </div>
</div>
<?php                       
      }
      ?>
<!-- Inicio impressão de tela da lista de trabalhadores no evento -->