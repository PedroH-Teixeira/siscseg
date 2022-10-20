<?php
$assunto = $_POST["assunto"];
$texto = $_POST["texto"];


// Adicionando a imagem
$pasta = "imagens/noticias/";
    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    
        $nome_imagem    = $_FILES['imagem']['name'];
        $tamanho_imagem = $_FILES['imagem']['size'];
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        
            
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
            
            if($tamanho < 1024){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem
                
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    
                    $inserir = $mysqli->query("INSERT INTO noticias (imagem, assunto, texto) VALUES ('$nome_atual','$assunto','$texto') ");
                    if($inserir){
                        $buscar_email = mysqli_query($mysqli,"SELECT email FROM cadastro_seguranca WHERE nivel=2 AND datacadastro>0");
                        while ($enviar = $buscar_email->fetch_array()){
                            $email = $enviar["email"];
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
                            $Email->Subject = $assunto;
                            // Define o texto da mensagem (aceita HTML)
                            $Email->Body .= "<br /><br />"
                                    .$texto
                                    ."<br /><br />"
                                    ."Atenciosamente;<br />"
                                    ."<b>Equipe SISCSEG</b><br />"
                                    ."<i>Inovando no mercado de seleção!</i>";
                            $Email->Send();
                        }
                        echo "Um e-mail foi enviado para os usuarios cadastrados no site.";
                        
                    } else {
                        echo 'Erro: ', $mysqli->error;//Exibe o erro
                    }
                    
				}else{
                    $inserir = $mysqli->query("INSERT INTO noticias (assunto, texto) VALUES ('$assunto','$texto') ");
                    if($inserir){
                        $buscar_email = mysqli_query($mysqli,"SELECT email FROM cadastro_seguranca WHERE nivel=2 AND datacadastro>0");
                        while ($enviar = $buscar_email->fetch_array()){
                            $email = $enviar["email"];
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
                            $Email->Subject = $assunto;
                            // Define o texto da mensagem (aceita HTML)
                            $Email->Body .= "<br /><br />"
                                    .$texto
                                    ."<br /><br />"
                                    ."Atenciosamente;<br />"
                                    ."<b>Equipe SISCSEG</b><br />"
                                    ."<i>Inovando no mercado de seleção!</i>";
                            $Email->Send();
                        }
                        echo "Um e-mail foi enviado para os usuarios cadastrados no site.";
                    } else {
                        echo 'Erro: ', $mysqli->error;//Exibe o erro
                    }
                }
            }else{
                echo "A imagem deve ser de no máximo 1MB";
            }
?>