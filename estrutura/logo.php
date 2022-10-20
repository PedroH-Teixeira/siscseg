<div class="row">
<?php
if(isset($_GET["op"])){
?>
    <div class="col-md-5">
        <img id="minilogo" class="img-fluid" src="imagens/logo/mini-logo.jpg">  
    </div>
        <div class="col-md-7">
    <header id="cabecalho-secao">
                <hgroup>
                    <h2>&nbsp;Data: <?php echo $data = date("d/m/Y"); ?><br>
                &nbsp;Seja bem-vindo, <?php $nome = explode(" ",$_SESSION['nome']); echo $nome[0];?>! <a href="logout.php">Sair</a></h2>
                
                </hgroup>
        </header>
        </div>
<?php
}else{
?>

    <div class="col-md-12">
        <div class="text-center">
        <img id="logo" class="img-fluid" src="imagens/logo/logo-siscseg.jpg">
        </div>
            <hgroup>
                <h1 id="transparente">SISCSEG</h1>
                <h2 id="transparente">Sistema de Cadastro de Seguranças</h2>
            </hgroup>
       </div> 
<br>
<?php
}
?>
</div>