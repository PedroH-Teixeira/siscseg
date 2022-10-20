<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<?php
if(isset($_POST['nome'])){
   $nome = addslashes($_POST['nome']);
   $cpf = addslashes($_POST['cpf']);
   $email = addslashes($_POST['email']);
   $senha = addslashes($_POST['senha']);
   $csenha = addslashes($_POST['csenha']);
   
   $cpfvalido = mysqli_query($mysqli,"SELECT cpf FROM cadastro_seguranca WHERE cpf='$cpf'");
   $emailvalido = mysqli_query($mysqli,"SELECT email FROM cadastro_seguranca WHERE email='$email'");
   $nivel = mysqli_query($mysqli,"SELECT nivel FROM cadastro_seguranca WHERE cpf='$cpf'");
   $nivel_zero = $nivel->fetch_array();
       
       if(mysqli_num_rows($cpfvalido) > 0 && $nivel_zero["nivel"]>0){
           echo "O \"CPF\" informado já possui cadastro! </br>Caso tenha esquecido a senha, clique em recuperar senha ou entre em contato com os administradores.";
       }elseif(mysqli_num_rows($emailvalido) > 0){
           echo "O \"E-mail\" informado já possui cadastro! </br>Caso tenha esquecido a senha, clique em recuperar senha ou entre em contato com os administradores.";
       }elseif($senha==$csenha){
           $senha = md5($senha);
   $inserir = $mysqli->query("INSERT INTO cadastro_seguranca (nome, cpf, email, senha) values ('$nome','$cpf','$email','$senha')");
                    if($inserir){
                        $id = $mysqli->insert_id;
                        $md5 = md5($id);
                        $link = "www.tecdin.com.br/siscseg/index.php?h=".$md5;
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
                        $Email->Subject = "Confirme seu cadastro SISCSEG";
                        // Define o texto da mensagem (aceita HTML)
                        $Email->Body .= "<br /><br />"
                                . "Clique aqui para confirmar o seu cadastro -> "
                                . "<a href='".$link."' taget='_blank'>Clique aqui</a>"
                                ."<br /><br />"
                                ."<b>Equipe SISCSEG</b><br />"
                                ."<i>Inovando no mercado de seleção!</i>";
   
        
                    if(!$Email->Send()){
                        echo " Por algum motivo o seu o código não pôde ser enviado para o seu e-mail.";
                    }else{
                        echo "Um link foi enviado para o e-mail informado para confirmação.</br>";
                        echo "Verifique também na caixa de SPAM.</br>";
                    }
                      $mysqli->close(); //Fecha a execução da query  
                    } else {
                        echo 'Erro: ', $mysqli->error;//Exibe o erro
                    }
    
  
     } else {
       echo "As senhas não conferem. Favor digitar novamente.";
}
}
    ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Cadastro</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="index.php?pg=cadastro_usuario" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" type="text" onkeyup="maiuscula('nome')" name="nome" placeholder="Nome Completo" id="nome" maxlength="150" required/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$" type="text" name="cpf" id="cpf" maxlength="14" placeholder="CPF" required/>
                        </div>
                        <div class="form-group">
                            <input  class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="E-mail" name="email" type="email" autofocus required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha" name="senha" type="password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Confirmar senha" name="csenha" type="password" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                        <button type="button" name="voltar" value="false" class="btn btn-success btn-block" onclick="form.action='index.php'; form.submit()">Voltar</button>
                </fieldset> 

                </form>

            </div>
        </div>
    </div>
</div>
