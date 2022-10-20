<div class="container">
<script type="text/javascript">
	function loginsuccessfully_admin(){
		setTimeout("window.location='index.php?pg=menu_admin&op=eventos'", 2000);
	}
        function loginsuccessfully_usuario(){
		setTimeout("window.location='index.php?pg=menu_usuario&op=eventos'", 2000);
	}
	function loginfailed(){
		setTimeout("window.location='index.php'", 3000);
	}
</script>
<?php
       
	// Pega os dados do formulário Usuário e Senha metodo POST
	$email=$_POST['email'];
        $senha=$_POST['senha'];
        
        //Codifica a senha
        $senha = md5($senha);
 
	// Realiza uma consulta no banco e valida os dados
	$sql_query = "SELECT * FROM cadastro_seguranca WHERE email = '$email' AND senha = '$senha'";
	$result = mysqli_query($mysqli,$sql_query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
        
        // Busca o nome e o nível
        $busca = $mysqli->query($sql_query) or die($mysqli->error);
        while($buscar = $busca->fetch_array()){
              $nome = $buscar['nome'];
              $nivel = $buscar['nivel'];
              $id = $buscar['id'];
        }
 
	// Se o resultado da consulta Usuário e Senha for verdadeiro valida.
	if($count == 1)
	{
            if($nivel==1){
                session_start();
                $_SESSION['email']=$_POST['email'];
                $_SESSION['senha']=$senha;
                $_SESSION['nome']=$nome;
                $_SESSION['nivel']=$nivel;
                $_SESSION['id'] = $id;
                echo "Você foi autenticado com sucesso! Aguarde...";
                echo "<script>loginsuccessfully_admin()</script>";
            } elseif($nivel ==2) {
                session_start();
                $_SESSION['email']=$_POST['email'];
                $_SESSION['senha']=$senha;
                $_SESSION['nome']=$nome;
                $_SESSION['nivel']=$nivel;
                $_SESSION['id'] = $id;
                echo "Você foi autenticado com sucesso! Aguarde...";
                echo "<script>loginsuccessfully_usuario()</script>";
            } else {
                echo"O e-mail cadastrado não está ativo. Favor fazer a confirmação no link que enviamos para o seu e-mail.";
                echo "<script>loginfailed()</script>";
            }
	}
	else
	{
	echo "Nome de usuario ou senha inválida. Aguarde um instante e tente novamente.";
	echo "<script>loginfailed()</script>";
	}

?>
</div>