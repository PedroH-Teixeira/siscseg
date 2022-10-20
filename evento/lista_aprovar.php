<?php

$lista = $_POST['lista'];
if(isset($_POST["acao"]) && $_POST["acao"]=="aprovar"){
    $id = $_POST["id"];
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
        
        $assunto = "Confirmação de participação no evento";
        $email_remetente = "siscseg@tecdin.com.br";
        $siscseg = "Equipe SISCSEG";
        $mensagem = " teste";


        $headers  = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $siscseg <$email_remetente>\r\n";
        
        if(mail($email,$assunto,$mensagem,$headers)){
            echo "Um e-mail enviado para ".$email." confirmando a participação no evento ".$evento;
        }else{
            echo "Erro: não foi possível encaminhar o e-mail de confirmação.";
        }
        
    } 
if(isset($_POST["acao"]) && $_POST["acao"]=="remover"){
    $id = $_POST["id"];
    $inserir = $mysqli->query("UPDATE trabalho_evento SET trabalhou=0 WHERE id_seguranca='$id' AND id_evento='$lista'");
    if($inserir){
        $nome_evento = "SELECT nome_evento FROM controle_servico WHERE id_c='$lista'";
        $evento = $mysqli->query($nome_evento) or die($mysqli->error);
        while ($enviar = $evento->fetch_array()){
            $evento = $enviar["nome_evento"];
        }
        $envia_email = "SELECT email FROM cadastro_seguranca WHERE id='$id'";
        $email = $mysqli->query($envia_email) or die($mysqli->error);
        while ($enviar = $evento->fetch_array()){
            $email = $enviar["email"];
        }
        $assunto = "Confirmação de participação no evento";
        $email_remetente ="siscseg@tecdin.com.br";
        $siscseg = "Equipe SISCSEG";
        $mensagem = "<p>Você foi DESCLASSIFICADO(A) da participação no evento ".$evento." por excesso de contigente.</br>"
                ."Fique atento a publicação de novos eventos e faça sua inscrição, desejamos sorte na próxima seleção.</br></br>"
                ."Atenciosamente;</br>"
                ."<b>Equipe SISCSEG</b></br>"
                ."<i>Inovando no mercado de seleção!</i></p>";


        $headers  = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $siscseg <$email_remetente>\r\n";
        
        if(mail($email,$assunto,$mensagem,$headers)){
            echo "Uma confirmação foi enviada para o e-mail: ".$email;
        }else{
            echo "Ocorreu um erro ao enviar o e-mail.";
        }
    }else {
        echo "Ocorreu um erro: O e-mail não pôde ser enviado.";
    }
}
