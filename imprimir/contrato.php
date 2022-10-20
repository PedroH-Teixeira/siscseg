<body onload="self.print();self.close();">
<div class="row">    
  <?php
  if($_GET["acao"]=="imprime1"){
      $id_evento = $_GET["evento"];
      $id = $_GET['imprimir'];
      $sql = "SELECT * FROM trabalho_evento e JOIN controle_servico s ON e.id_evento = s.id_c"
        . " JOIN cadastro_seguranca c ON e.id_seguranca = c.id WHERE id_seguranca='$id' AND id_evento='$id_evento'";
      $reg = $mysqli->query($sql) or die($mysqli->error);
  

    while($exibe = $reg->fetch_array()){
  ?>
    
    <div class="col-md-8 col-md-offset-2">   
       <h2 style="text-align:center">CONTRATO DE TRABALHO POR TEMPO DETERMINADO</h2><br>
<p>Por este particular instrumento contratual de trabalho, firmado entre partes, de um lado, <b>DETROIT SEG VIGILÂNCIA E SEGURANÇA PRIVADA LTDA</b>, portadora do CNPJ nº 11.923.136/0001-90, empresa estabelecida à Rua Rio Guaporé, nº 06 – casa, Hélio Ferraz – Serra/ES, a seguir denominada simplesmente <b>EMPREGADORA</b>, e, de outro lado, <b style="text-transform:uppercase"><?php echo $exibe["nome"]; ?></b>, portador do CPF nº <?php echo $exibe["cpf"]; ?> e RG nº <?php echo $exibe["rg"]; ?> a seguir denominado simplesmente <b>EMPREGADO</b>, fica justo e contratado o que segue:</p>
1 – <b>OBJETO:</b>  O empregado é admitido, nesta data, aos serviços da empregadora, para exercer a função de <b>SEGURANÇA DE EVENTOS</b>.<br>
1.1. – O empregado deverá estar devidamente capacitado com o curso de Vigilantes com Extensão de Segurança para Grandes Eventos. <br>
1.2. – O empregado desempenhará seus procedimentos de trabalho de acordo com a preconização de sua capacitação técnica de Vigilante e Extensão em Grandes Eventos.<br>
2 – <b>SALÁRIO:</b> A empregadora pagará ao empregado pelos serviços prestados, o salário de R$ 135,00 (Cento e trinta e cinco reais), pelo dia/escala de serviço de 12 Horas.<br>
2.1. – A empregadora, a seu exclusivo arbítrio e sem qualquer caráter obrigacional, poderá conceder adiantamentos salariais, sendo efetuada a devida compensação do respectivo valor na contraprestação normal ou em haveres de toda e qualquer natureza.<br>
3 – <b>HORÁRIO E REGIME DE TRABALHO:</b> O empregado cumprirá 12 horas de trabalho.<br>
4 – <b>RECUPERAÇÃO DO TEMPO PERDIDO:</b> Nos casos previstos no Art. 61, Parágrafo 3º da Consolidação das Leis do Trabalho, será facultado a empregadora o uso do direito do tempo perdido.<br>
5 – <b>DESCONTOS:</b> A empregadora poderá descontar dos haveres do empregado, além dos descontos legais ou expressamente autorizados, os prejuízos por ele causados, por dolo ou culpa, sem prejuízo da penalidade que a ação ou omissão comportar.<br>
6 – <b>VALE TRANSPORTES:</b> Caso o empregado faça uso de transporte regular público em seus deslocamentos residência – trabalho e vice-versa, deverá solicitar à empregadora, por escrito e contra-recibo, o fornecimento de vale transporte.<br>
7 – <b>VIGÊNCIA:</b> O presente contrato tem caráter de tempo determinado, vigorando a partir desta data <b><?php echo date('d/m/Y', strtotime($exibe["data"])); ?></b>  das <b><?php echo date('H:i:s'); ?></b>, independentemente de quaisquer interrupções ou suspensões, em cujo termo estará extinto, sem que caiba a qualquer das partes aviso prévio ou indenização.<br>
7.1. – Este contrato poderá ser prorrogado, uma única vez, observando, porém, o limite máximo referido no art. 445, parágrafo único da Consolidação das Leis do Trabalho.<br>
8 – <b>DISPOSIÇÕES GERAIS:</b> <br>
1 – Ao término do prazo pactuado e permanecendo o empregado no desempenho de suas atribuições, transformar-se a o presente contrato  indeterminado, com plena vigência de todas as demais disposições contratuais.<br>
2 – As partes elegem o foro de <b>SERRA/ES</b>, como único competente para dirimir quaisquer litígios oriundos do presente contrato.<br>
<br>
E assim, por estarem de pleno acordo com o contido neste instrumento, empregadora e empregado o firmam consoante os ditames legais.<br>
<br>
Serra/ES,  <?php echo date('d/m/Y', strtotime($exibe["data"])); ?><br><br><br>


___________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__________________________________<br>
DETROIT SEG VIG. E SEG. PRIVADA LTDA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assinatura do empregado

                             
                             </div> 
    <?php 
  }
  }
    ?>
    <!-- FIM da impressão do imprimir 1 -->
</div>