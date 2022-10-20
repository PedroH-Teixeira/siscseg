<body onload="self.print();self.close();">
<div class="row">    
  <?php
  if($_GET["acao"]=="imprime2"){
      $id_evento = $_GET["evento"];
      $id = $_GET['imprimir'];
      $sql = "SELECT * FROM trabalho_evento e JOIN controle_servico s ON e.id_evento = s.id_c"
        . " JOIN cadastro_seguranca c ON e.id_seguranca = c.id WHERE id_seguranca='$id' AND id_evento='$id_evento'";
      $reg = $mysqli->query($sql) or die($mysqli->error);
  

    while($exibe = $reg->fetch_array()){
  ?>
    
    <div class="col-md-8 col-md-offset-2">   
        <br><br>
        Serra/ES, <?php echo date("d/m/Y");?><br>

        <h2 style="text-align: center">RECIBO</h2><br>

        <p>Eu, <b style="text-transform: uppercase"><?php echo $exibe["nome"];?></b>, portador do CPF nº <?php echo $exibe["cpf"];?>, recebi da empresa <b>DETROIT SEG VIGILANCIA E SEGURANÇA PRIVADA LTDA</b> o valor de R$ 28,00 (Vinte e oito reais), referente ao pagamento do <b>TICKET ALIMENTAÇÃO</b> no evento <b style="text-transform: uppercase"><?php echo $exibe["nome_evento"];?></b></p><br>
        <br>

        - Valor total pago: R$ 28,00<br>



        <div style="text-align: center;margin-bottom: -40px;margin-top: 50px">____________________________________</div><br>
                                        <h6 style="text-align: center">Assinatura do Segurança</h6>
                             
                             </div> 
    <?php 
  }
  }
    ?>
    <!-- FIM da impressão do imprimir 1 -->
</div>