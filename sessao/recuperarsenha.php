<div class="row">
<?php
if(isset($_GET["pg"])&& $_GET["pg"]=="recuperar_senha" && !isset($_GET["codigo"])){
if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'){
    $email = $_POST['email'];
    $verificar = mysqli_query($mysqli,"SELECT email FROM cadastro_seguranca WHERE email = '$email'");
    $row = mysqli_fetch_array($verificar,MYSQLI_ASSOC);
    if(mysqli_num_rows($verificar) == 1){
    $codigo = base64_encode($email);
    $data_expirar = date('Y-m-d H-i-s', strtotime('+1 day'));
    $inserir = mysqli_query($mysqli,"INSERT INTO codigos SET codigo = '$codigo', data = '$data_expirar'");
    $link = "www.tecdin.com.br/siscseg/index.php?pg=recuperar_senha&codigo=".$codigo;
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
    $Email->Subject = "Recuperação de senha SISCSEG";
    // Define o texto da mensagem (aceita HTML)
    $Email->Body .= "<br /><br />"
            . "Recebemos uma tentativa de recuperação de senha para esse e-mail,"
            ." caso não tenha sido você, favor desconsiderar. "
            ."Caso contrário, clique no link abaixo:<br/>"
            ."<a href='".$link."' taget='_blank'>Clique aqui</a>"
            ."<br /><br />"
            ."<b>Equipe SISCSEG</b><br />"
            ."<i>Inovando no mercado de seleção!</i>";
   
        if($inserir){
            if(!$Email->Send()){
                echo " Por algum motivo o seu o código não pôde ser enviado para o seu e-mail.";
            }else{
                echo "Enviamos um e-mail de recuperação de senha para o e-mail informado.";
            }
        }
    }else{
        echo "O e-mail informado não está cadastrado.";
    }
}


?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Recuperar Senha</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input  class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="E-mail" name="email" type="email" autofocus required>
                        </div>
                        
                        <input type="hidden" name="acao" value="recuperar"/>
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                        <button type="button" name="voltar" value="false" class="btn btn-success btn-block" onclick="form.action='index.php'; form.submit()">Voltar</button>
                </fieldset> 

                </form>

            </div>
        </div>
    </div>
</div>
<?php
}
if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $email_codigo = base64_decode($codigo);
    $selecionar = mysqli_query($mysqli,"SELECT * FROM codigos WHERE codigo = '$codigo' AND data > NOW()");
    $row = mysqli_fetch_array($selecionar,MYSQLI_ASSOC);
    if (mysqli_num_rows($selecionar) >= 1){
       if(isset($_POST["acao"]) && $_POST["acao"] == "mudar"){
           $nova_senha = $_POST["novasenha"];
           $senha_md5 = md5($nova_senha);
           $atualizar = mysqli_query($mysqli,"UPDATE cadastro_seguranca SET senha = '$senha_md5' WHERE email = '$email_codigo'");
           if($atualizar){
               $mudar = mysqli_query($mysqli,"DELETE FROM codigos WHERE codigo = '$codigo");
               echo "A senha foi modificada com sucesso.";
               echo "<script>mudaPagina()</script>";
           }
       }
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Informe a Nova Senha</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nova Senha" name="novasenha" type="password" required>
                        </div>
                        
                        <input type="hidden" name="acao" value="mudar">
                        <button type="submit" class="btn btn-success btn-block">Alterar Senha</button>
                </fieldset> 

                </form>

            </div>
        </div>
    </div>
</div>

<?php
    } else {
        echo "Desculpe, o link expirou.";
    }
}

?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
<?php
if(isset($_GET["op"]) && $_GET["op"]=="alterar_senha"){
    if(isset($_POST["acao"]) && $_POST["acao"] == "mudar"){
         $email_user = $_SESSION["email"];
         $senha_user = $_SESSION["senha"];
            $senha_antiga = $_POST["senha_antiga"];
            $s_antiga_md5 = md5($senha_antiga);
            $verificar = mysqli_query($mysqli,"SELECT id,senha FROM cadastro_seguranca WHERE email = '$email_user' AND senha = '$senha_user'");
                $row = mysqli_fetch_array($verificar,MYSQLI_ASSOC);
                $senha_atual = $row["senha"];
                if($senha_atual==$s_antiga_md5){
                        $senha = $_POST["senha"];
                        $csenha = $_POST["csenha"];
                        if($senha==$csenha){
                            $id = $row["id"];
                            $senha_md5 = md5($senha);
                            $atualizar = mysqli_query($mysqli, "UPDATE cadastro_seguranca SET senha = '$senha_md5' WHERE id = '$id'");
                            if($atualizar){
                                echo "Sua senha foi modificada com sucesso!";
                                $_SESSION["senha"] = $senha_md5;
                            }else{
                                echo "Ocorreu algum erro ao realizar a mudança.<br> "
                                ."Tente novamente ou entre em contato com o Administrador";
                            }
                        }else{
                            echo "A nova senha informada não se confirmam.";
                        }
                }else{
                    echo "A senha antiga não confere.";
                }
    }
    
?>

    
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Alterar Senha</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha Antiga" name="senha_antiga" type="password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nova Senha" name="senha" type="password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Confirmar senha" name="csenha" type="password" required>
                        </div>
                        
                        <input type="hidden" name="acao" value="mudar">
                        <button type="submit" class="btn btn-success btn-block">Alterar</button>
                </fieldset> 

                </form>

            </div>
        </div>
    </div>
</div>
<?php
}
?>
</div>