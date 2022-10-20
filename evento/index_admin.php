<div class="row">
    <div class="col-md-8">
<form  action="index.php?pg=menu_admin&op=eventos&acao=remover_evento"  method="post">

    <input type="submit" id="excluir"value="Excluir"><br>

<?php
$datadb = date("Y/m/d");
$sql = "SELECT * FROM controle_servico co JOIN cadastro_cliente ca ON co.id_organizador = ca.id WHERE data >= '$datadb' ORDER by data, hora";
$query = $mysqli->query($sql) or die($mysqli->error);


while($exibe = $query->fetch_array()){
    $id_evento = $exibe["id_c"];
    $busca_evento2 = "SELECT id_evento FROM trabalho_evento WHERE id_evento = '$id_evento'";
    $quant_vagas_total = mysqli_query($mysqli,$busca_evento2);
	$count_total = mysqli_fetch_array($quant_vagas_total,MYSQLI_ASSOC);
	$vagas_total = mysqli_num_rows($quant_vagas_total);
    $busca_evento = "SELECT id_evento FROM trabalho_evento WHERE id_evento = '$id_evento' AND trabalhou='Sim'";
    $quant_vagas = mysqli_query($mysqli,$busca_evento);
	$count = mysqli_fetch_array($quant_vagas,MYSQLI_ASSOC);
	$vagas = mysqli_num_rows($quant_vagas);
 
   
?>
    
            <table class="table table-striped">
                <thead>
      </thead>
      <tbody>
      <tr><td colspan="2"><input type="checkbox" name="selecionar[]" id="selecionar[]" value="<?php echo $exibe["id_c"]; ?>" /></td></tr></form>
      <tr><th class="col-md-5">Cód. Identificador: </th><td><?php echo $exibe["id_c"]; ?></td></tr>  
   <tr><th>Nome do evento: </th><td><?php echo $exibe["nome_evento"]; ?></td></tr>
   <tr><th>Organizador:</th><td><?php echo $exibe["nome_fantasia"];?></td></tr>
   <tr><th>Local:</th><td><?php echo $exibe["endereco_evento"]." N°: ". $exibe["endereco_evento_n"]; ?></td></tr>
    <tr><th></th><td><?php echo $exibe["endereco_evento_bairro"].", ".$exibe["endereco_evento_cidade"]." - ".$exibe["endereco_evento_estado"]; ?>
            </td></tr>
    <tr><th></th><td><?php echo $exibe["end_evento_complemento"];?></td></tr>
   <tr><th>Horário:</th><td><?php echo $exibe["hora"];?></td></tr>
   <tr><th>Data:</th><td><?php echo date('d/m/Y', strtotime($exibe["data"]));?></td></tr>
   <tr><th>Tipo:</th><td><?php echo $exibe["tipo"];?></td></tr>
   <tr><th>Observação:</th><td><?php echo nl2br($exibe["observacao"]);?></td></tr>
   <tr><th>Vagas disponíveis:</th><td>
       <?php 
            $disponiveis = $exibe["vagas"]-$vagas;
            echo $disponiveis;
        ?>/<?php echo $exibe["vagas"];?></td></tr>
   <tr><th>Seguranças Inscritos: <?php echo $vagas_total;?></th><td>
           <form action="index.php?pg=menu_admin&op=lista" method="post">
               <input type="hidden" name="lista" value="<?php echo $exibe["id_c"]; ?>"/>
               <input id="botao-lista"type="submit" id="lista"value="Lista" class="botao">
           </form></td></tr>
   <?php
 $email_user = $_SESSION["email"];
 $senha_user = $_SESSION["senha"];
   
 $busca_id = "SELECT id FROM cadastro_seguranca WHERE email = '$email_user' AND senha = '$senha_user'";
$id = $mysqli->query($busca_id) or die($mysqli->error);
  

while($exibe_id = $id->fetch_array()){
    $id_usuario = $exibe_id["id"];
}
?>
   </tbody>
    </table>
    
<?php
   }
?>
</div>
    <div class="col-md-4">
            <h2>Notícias:</h2>
            <form action="index.php?pg=menu_admin&op=eventos&acao=noticia" enctype="multipart/form-data" method="post">
            <input class="col-xs-12" type="text" placeholder="Assunto" maxlength="100" name="assunto" id="assunto"/><br><br>
            <input class="col-xs-12" type="file" name="imagem" id="imagem"/><br><br>
            <textarea class="col-xs-12" name="texto" id="texto" rows="10" placeholder="Informações e notícias..." /></textarea>
            <button style="margin-top: 10px;margin-bottom: 10px">Enviar</button>
        </form>
        <?php
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                    $sql = "SELECT * FROM noticias ORDER by id_noticias DESC";
                    $query = $mysqli->query($sql) or die($mysqli->error);
                    $total = mysqli_num_rows($query);
                    $registros = 8;
                    $numPaginas = ceil($total/$registros); 
                    $inicio = ($registros*$pagina)-$registros;
                    $sql = "SELECT * FROM noticias ORDER by id_noticias DESC limit $inicio,$registros";
                    $query = $mysqli->query($sql) or die($mysqli->error);
                    $total = mysqli_num_rows($query);
                    while($exibe = $query->fetch_array()){
                    ?>
            <table id="noticia" class="table table-striped ">
                                 <thead>
                                 <th>
                                     <form action="index.php?pg=menu_admin&op=eventos&acao=remover_noticia" method="post">
                                         <input type="hidden" name="acao" value="remover_noticia">
                                         <button class="col-xs-offset-11" name="remover_noticia" value="<?php echo $exibe["id_noticias"];?>">
                                             <span class="glyphicon glyphicon-remove-sign" style="font-size: 18px;color: #999999"></span>
                                          </button>
                                     </form>
                                 </th>
                                  </thead>
                                  <tbody>
                                      <?php if($exibe["assunto"]!=""){?>
                                  <tr>
                                      <td><h4><?php echo $exibe["assunto"];?></h4></td>
                                  </tr>
                                      <?php }?>
                                  <?php if($exibe["imagem"]!=""){?>
                                  <tr>
                                      <td id="imagem">
                                          <a href="imagens/noticias/<?php echo $exibe["imagem"]; ?>" title="Clique aqui para ampliar" >
                                          <img src="imagens/noticias/<?php echo $exibe["imagem"]; ?>" id="previsualizar" class="noticia"></a><!--//imprime a foto na tela--></br></td>
                                  </tr>
                                  <?php }?>
                                  <?php if($exibe["texto"]!=""){?>
                                <tr>
                                    <td><p><?php echo nl2br($exibe["texto"]); ?></p></td>
                                </tr>
                                <?php }?>
                                </tbody>
                                </table>
                    
                    
                    
                    <?php
                    }
                    for($i = 1; $i < $numPaginas + 1; $i++) { 
                        echo "<a href='index.php?pg=menu_admin&op=eventos&pagina=$i'>".$i."</a> "; 
                    }
                    ?>
    </div>
</div>