<div class="row">      
<?php

$lista = $_POST['lista'];
if(isset($_POST["acao"]) && $_POST["acao"]=="aprovar"){
    $id = $_POST["id"];
    $inserir = $mysqli->query("UPDATE trabalho_evento SET trabalhou='Sim' WHERE id_seguranca='$id' AND id_evento='$lista'");
    if($inserir){
        $nome_evento = mysqli_query($mysqli,"SELECT nome_evento FROM controle_servico WHERE id_c='$lista'");
        while ($enviar = $nome_evento->fetch_array()){
            $evento = $enviar["nome_evento"];
        }
        $envia_email = mysqli_query($mysqli,"SELECT email FROM cadastro_seguranca WHERE id='$id'");
        while ($enviar = $envia_email->fetch_array()){
            $email = $enviar["email"];
        }
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        
        $nome = "Equipe SISCSEG";
        $remetente = "siscseg@tecdin.com.br";
        require_once('funcoes/envia_email/PHPMailer_5-2-0/class.phpmailer.php');

        $Email = new PHPMailer();
        $Email->SetLanguage("br");
        $Email->IsSMTP(); // Habilita o SMTP 
        $Email->SMTPAuth = true; //Ativa e-mail autenticado
        $Email->Host = 'smtp.gmail.com'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
        $Email->Port = '587'; // Porta de envio
        $Email->SMTPSecure = 'tls';
        $Email->Username = 'siscseg@gmail.com'; //e-mail que será autenticado
        $Email->Password = 'sisc@seg'; // senha do email
        // ativa o envio de e-mails em HTML, se false, desativa.
        $Email->IsHTML(true); 
        $Email->CharSet = 'UTF-8';	
        // email do remetente da mensagem
        $Email->From = $remetente;
        // nome do remetente do email
        $Email->FromName = $nome;
        // Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
        $Email->AddReplyTo($remetente,$nome);
        $Email->AddAddress($email); // para quem será enviada a mensagem
        // informando no email, o assunto da mensagem
        $Email->Subject = "Confirmação de participação no evento";
        // Define o texto da mensagem (aceita HTML)
        $Email->Body .= "<br /><br />"
                ."Você foi devidamente APROVADO(A) para trabalhar no evento ".$evento.".<br />"
                ."É importante que você compareça no horário estipulado para início e apresente cópia simples "
                ."de documento oficial de identificação, bem como cópia do curso de vigilante, reciclagem e "
                ."extenção em grandes eventos."
                ."<br /><br />"
                ."Atenciosamente;<br />"
                ."<b>Equipe SISCSEG</b><br />"
                ."<i>Inovando no mercado de seleção!</i>";
        
        if(!$Email->Send()){
            echo "Erro: não foi possível encaminhar o e-mail de confirmação.";
        }else{
            echo "Um e-mail enviado para ".$email." confirmando a participação no evento ".$evento;
        }
        
    } else {
        echo "Ocorreu um erro: O e-mail não pôde ser enviado.";
    }
}
if(isset($_POST["acao"]) && $_POST["acao"]=="remover"){
    $id = $_POST["id"];
    $inserir = $mysqli->query("UPDATE trabalho_evento SET trabalhou=0 WHERE id_seguranca='$id' AND id_evento='$lista'");
    if($inserir){
        $nome_evento = mysqli_query($mysqli,"SELECT nome_evento FROM controle_servico WHERE id_c='$lista'");
        while ($enviar = $nome_evento->fetch_array()){
            $evento = $enviar["nome_evento"];
        }
        $envia_email = mysqli_query($mysqli,"SELECT email FROM cadastro_seguranca WHERE id='$id'");
        while ($enviar = $envia_email->fetch_array()){
            $email = $enviar["email"];
        }
        $nome = "Equipe SISCSEG";
        $remetente = "siscseg@tecdin.com.br";
        require_once('funcoes/envia_email/PHPMailer_5-2-0/class.phpmailer.php');

        $Email = new PHPMailer();
        $Email->SetLanguage("br");
        $Email->IsSMTP(); // Habilita o SMTP 
        $Email->SMTPAuth = true; //Ativa e-mail autenticado
        $Email->Host = 'smtp.gmail.com'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
        $Email->Port = '587'; // Porta de envio
        $Email->SMTPSecure = 'tls';
        $Email->Username = 'siscseg@gmail.com'; //e-mail que será autenticado
        $Email->Password = 'sisc@seg'; // senha do email
        // ativa o envio de e-mails em HTML, se false, desativa.
        $Email->IsHTML(true); 
        $Email->CharSet = 'UTF-8';	
        // email do remetente da mensagem
        $Email->From = $remetente;
        // nome do remetente do email
        $Email->FromName = $nome;
        // Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
        $Email->AddReplyTo($remetente,$nome);
        $Email->AddAddress($email); // para quem será enviada a mensagem
        // informando no email, o assunto da mensagem
        $Email->Subject = "Confirmação de participação no evento";
        // Define o texto da mensagem (aceita HTML)
        $Email->Body .= "<br /><br />"
                ."Você foi DESCLASSIFICADO(A) da participação no evento ".$evento." por excesso de contigente.<br />"
                ."Fique atento a publicação de novos eventos e faça sua inscrição, desejamos sorte na próxima seleção."
                ."<br /><br />"
                ."Atenciosamente;<br />"
                ."<b>Equipe SISCSEG</b><br />"
                ."<i>Inovando no mercado de seleção!</i>";

        
        if(!$Email->Send()){
            echo "Erro: não foi possível encaminhar o e-mail de confirmação.";
        }else{
            echo "Um e-mail enviado para ".$email." confirmando a desaprovação no evento ".$evento;
        }
    }else {
        echo "Ocorreu um erro: O e-mail não pôde ser enviado.";
    }
}
$selecionar_evento = "SELECT * FROM trabalho_evento e JOIN controle_servico s ON e.id_evento = s.id_c"
        . " JOIN cadastro_seguranca c ON e.id_seguranca = c.id WHERE id_evento = '$lista'";
$evento = $mysqli->query($selecionar_evento) or die($mysqli->error);
$evento2 = $mysqli->query($selecionar_evento) or die($mysqli->error);
$evento_nome = $mysqli->query($selecionar_evento) or die($mysqli->error);
$evento_nome = $evento_nome->fetch_array();
$i=0;
$y=0;
?>

<div class="col-md-10 col-md-offset-1">   
    <h2>Evento: <?php echo $evento_nome["nome_evento"]; ?></h2> 
                              <div class="table-responsive">
                                <table class="table table-striped ">
                                 <thead>
                                     <tr>
                                         <th>N°:</th>
                                         <th>Código</th>
                                         <th style="text-align: center">Nome</th>
                                         <th style="text-align: center">CPF</th>
                                         <th style="text-align: center">Contrato</th>
                                         <th style="text-align: center">Alimentação</th>
                                         <th style="text-align: center">Transporte</th>
                                         <th style="text-align: center">Pagamento</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                          
    
<?php
while($exibe_evento = $evento->fetch_array()){
    if($exibe_evento["trabalhou"]=="Sim"){
        $i++;
?>
     <tr>
      <th><?php echo $i;?></th>
      <th><?php echo $exibe_evento["id"];?></th>
      <td><?php echo $exibe_evento["nome"];?></td>
      <td><?php echo $exibe_evento["cpf"];?></td>
      <td>
          <form style="text-align: center">
              <input type="hidden" name="acao" value="imprime1">
              <input type="hidden" name="evento" value="<?php echo $lista;?>">
              <input type="hidden" name="pg" value="imprimir">
              <button formtarget="_blank" name="imprimir" value="<?php echo $exibe_evento["id"];?>">
                  <span class="glyphicon glyphicon-print" style="font-size: 20px;color: yellowgreen"></span>
              </button>
          </form>
      </td>
      <td>
          <form style="text-align: center">
              <input type="hidden" name="acao" value="imprime2">
              <input type="hidden" name="evento" value="<?php echo $lista;?>">
              <input type="hidden" name="pg" value="imprimir">
              <button formtarget="_blank" name="imprimir" value="<?php echo $exibe_evento["id"];?>">
                  <span class="glyphicon glyphicon-print" style="font-size: 20px;color: yellowgreen"></span>
              </button>
          </form>
      </td>
      <td>
          <form style="text-align: center">
              <input type="hidden" name="acao" value="imprime3">
              <input type="hidden" name="evento" value="<?php echo $lista;?>">
              <input type="hidden" name="pg" value="imprimir">
              <button formtarget="_blank" name="imprimir" value="<?php echo $exibe_evento["id"];?>">
                  <span class="glyphicon glyphicon-print" style="font-size: 20px;color: yellowgreen"></span>
              </button>
          </form>
      </td>
      <td>
          <form style="text-align: center">
              <input type="hidden" name="acao" value="imprime4">
              <input type="hidden" name="evento" value="<?php echo $lista;?>">
              <input type="hidden" name="pg" value="imprimir">
              <button formtarget="_blank" name="imprimir" value="<?php echo $exibe_evento["id"];?>">
                  <span class="glyphicon glyphicon-print" style="font-size: 20px;color: yellowgreen"></span>
              </button>
          </form>
      </td>
    <?php                       
      }
}
      ?>
     </tr>
    </tbody>
                                </table>
                              </div>
                             </div>
    
                             <div class="col-md-4 col-md-offset-4 text-center">
                                 
                                <form>
                                    <input type="hidden" name="acao" value="lista">
                                    <input type="hidden" name="pg" value="imprimir">
                                    <button formtarget="_blank" name="imprimir" value="<?php echo $lista;?>" class="botao">Imprimir</button>
                                </form>
                             </div>
                                 <div class="col-md-10 col-md-offset-1">   
                            <h2>Seguranças Pendentes de Aprovação</h2> 
                              <div class="table-responsive">
                                <table class="table table-striped ">
                                 <thead>
                                     <tr>
                                         <th>N°:</th>
                                         <th>Código</th>
                                         <th style="text-align: center">Nome</th>
                                         <th style="text-align: center">CPF</th>
                                         <th style="text-align: center">Aprovar</th>
                                         <th style="text-align: center">Remover</th>
                                     </tr>
                                  </thead>
                                  <tbody>
        <?php
        while($exibe_evento = $evento2->fetch_array()){
    if($exibe_evento["trabalhou"]=="Não"){
        $y++;
?>
     <tr>
      <th><?php echo $y;?></th>
      <th><?php echo $exibe_evento["id"];?></th>
      <td><?php echo $exibe_evento["nome"];?></td>
      <td><?php echo $exibe_evento["cpf"];?></td>
      <td>
          <form style="text-align: center" method="post">
              <input type="hidden" name="acao" value="aprovar">
              <input type="hidden" name="lista" value="<?php echo $lista;?>">
              <button name="id" value="<?php echo $exibe_evento["id"];?>">
              <span class="glyphicon glyphicon glyphicon-ok" style="font-size: 20px;color: yellowgreen"></span>
              </button>
          </form>
      </td>
      <td>
          <form style="text-align: center" method="post">
              <input type="hidden" name="acao" value="remover">
              <input type="hidden" name="lista" value="<?php echo $lista;?>">
              <button name="id" value="<?php echo $exibe_evento["id"];?>">
              <span class="glyphicon glyphicon glyphicon-remove" style="font-size: 20px;color: red"></span>
              </button>
          </form>
      </td>
    <?php                       
      }
}
      ?>
                             </tr>
                            </tbody>
                                </table>
                              </div>
                             </div>   
                            <div class="col-md-4 col-md-offset-4 text-center">
                                 
                                <form>
                                    <input type="hidden" name="acao" value="pendentes">
                                    <input type="hidden" name="pg" value="imprimir">
                                    <button formtarget="_blank" name="imprimir" value="<?php echo $lista;?>" class="botao">Imprimir</button>
                                </form>
                             </div>
                            <div style="margin-top: 30px" class="col-md-4 col-md-offset-4 text-center">
                                    <form>
                                    <input type="hidden" name="pg" value="menu_admin">
                                    <button type="submit" name="op" value="eventos" class="botao">OK</button>
                                </form>
                                 
                             </div>
    
</div>