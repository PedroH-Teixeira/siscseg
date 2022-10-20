<?php
//Conexão com o banco de dados
include("conn.php"); 
//Referencia ao index
$pg = "index";
if(isset($_GET["pg"])){
    $pg = $_GET["pg"];
}
//Cadastro inicial antes do login
if($pg =="cadastro_usuario"){
    include_once 'sessao/cadastro_usuario.php';
}
if(isset($_GET["h"])){
    $h = $_GET['h'];
    $datacadastro = date("Y/m/d");
    if(!empty($h)){
     $confirma_md5 = $mysqli->query("SELECT id FROM cadastro_seguranca WHERE MD5(id) = '$h'"); 
     $count_id = mysqli_num_rows($confirma_md5);
        if($count_id == 1){
        $atualizar = $mysqli->query("UPDATE cadastro_seguranca SET nivel = '2', datacadastro = '$datacadastro' WHERE MD5(id) = '$h'");
                    if($atualizar){
                        $mysqli->close(); //Fecha a execução da query
                        echo "Cadastro confirmado com sucesso! Já pode efetuar o login.";
                    } else {
                        echo 'Erro: ', $mysqli->error;//Exibe o erro
                    }
        }else{
            echo "O link informado é inválido ou está corrompido!";
        }
    }else{
            echo "Confirmação inválida. Link vazio!";
         }
         
    }
//Tela de login
if($pg =="index"){
    include_once 'sessao/login.php';
}
if($pg =="login_autenticacao"){
    include_once 'sessao/login_autenticacao.php';
}
//Recuperar Senha
if($pg=="recuperar_senha"){
    include_once 'sessao/recuperarsenha.php';
}

//Página do usuário 
if ($pg=="menu_usuario") {
    $op=$_GET["op"];
    include_once 'estrutura/menu_usuario.php';
    if($op=="eventos"){
        include_once 'usuario/index_usuario.php';
    }
    if($op=="participando"){
        include_once 'usuario/historico_evento.php';
    }
    if($op=="historico"){
        include_once 'usuario/historico_evento.php';
    }
    if ($op=="editar_cadastro") {
        if(isset($_GET["acao"])){
            $acao = $_GET["acao"];
            if ($acao=="foto") {
                include_once 'usuario/envia_imagem.php';
            }
            if ($acao=="excluir") {
                include_once 'funcoes/excluir.php';
            }
        }
        include_once 'usuario/cadastro_seguranca.php';
    }
    if($op=="Dados"){
        include_once 'usuario/envia_formulario.php';
    }
    if($op=="Participar"){
        $acao=$_GET["acao"];
        if($acao=="NAO"){
            include_once 'usuario/index_usuario.php';
        }elseif($acao=="SIM"){
            include_once 'usuario/participar.php';
        }else{
            include_once 'usuario/participar.php';
        }
    }
    if($op=="alterar_senha"){
        include_once 'sessao/recuperarsenha.php';
    }
}
//Página do administrador
if($pg=="menu_admin"){
    $op=$_GET["op"];
    include_once 'estrutura/menu_admin.php';
    if($op=="eventos"){
        if(isset($_GET["acao"])){
            $acao = $_GET["acao"];
            if ($acao=="noticia") {
                include_once 'evento/noticias.php';
            }
            if ($acao=="remover_noticia" || $acao=="remover_evento") {
                include_once 'funcoes/excluir.php';
            }
        }
        include_once 'evento/index_admin.php';
    }
    if ($op=="lista") {
            include_once 'evento/lista.php';
        }
        
    if($op=="cliente"){
        $acao = $_GET["acao"];
        if($acao=="enviar"){
            include_once 'cliente/envia_cliente.php';
        }elseif($acao=="editar"){
            include_once 'cliente/editar_cliente.php';
        }else {
            include_once 'cliente/cadastro_cliente.php';
        }
    }
    if($op=="evento"){
        $acao = $_GET["acao"];
        if($acao=="enviar"){
            include_once 'evento/envia_evento.php';
        }elseif($acao=="editar"){
            include_once 'evento/editar_evento.php';
        }else {
            include_once 'evento/cadastro_evento.php';
        }
    }
    if($op=="controle"){
        $acao = $_GET["acao"];
        if($acao=="enviar"){
            include_once 'evento/controle_servico.php';
        }else{
        include_once 'evento/controle_servico.php';
        }
    }
    if($op=="seguranca"){
        $acao = $_GET["acao"];
        if($acao=="enviar"){
            include_once 'seguranca/cadastro_seguranca.php';
        }elseif($acao=="editar"){
            if(isset($_GET["foto"])){
                $foto = $_GET["foto"];
            if ($foto=="enviar") {
                include_once 'usuario/envia_imagem.php';
            }
            if ($foto=="excluir") {
                include_once 'funcoes/excluir.php';
            }
            }
            include_once 'seguranca/editar_seguranca.php';
        }else {
            include_once 'seguranca/cadastro_seguranca.php';
        }
    }
    if($op=="lista_efetivo"){
        include_once 'seguranca/efetivo_seguranca.php';
    }
    if($op=="buscar"){
        include_once 'funcoes/buscar_contato.php';
    }
    if ($op=="editar_cadastro") {
        if(isset($_GET["acao"])){
            $acao = $_GET["acao"];
            if ($acao=="foto") {
                include_once 'usuario/envia_imagem.php';
            }
            if ($acao=="excluir") {
                include_once 'funcoes/excluir.php';
            }
        }
        include_once 'seguranca/editar_perfil.php';
    }
    if($op=="Dados"){
        include_once 'usuario/envia_formulario.php';
    }
    if($op=="alterar_senha"){
        include_once 'sessao/recuperarsenha.php';
    }
    
}
if($pg=="imprimir"){
    $acao = $_GET["acao"];
    if($acao=="lista"){
    include_once 'imprimir/imp_lista.php';
    }
    if($acao=="pendentes"){
    include_once 'imprimir/imp_pendentes.php';
    }
    if($acao=="imprime1"){
    include_once 'imprimir/contrato.php';
    }
    if($acao=="imprime2"){
    include_once 'imprimir/alimentacao.php';
    }
    if($acao=="imprime3"){
    include_once 'imprimir/transporte.php';
    }
    if($acao=="imprime4"){
    include_once 'imprimir/pagamento.php';
    }
}
?>