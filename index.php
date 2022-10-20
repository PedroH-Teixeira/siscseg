<!DOCTYPE html>
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
    <?php include 'estrutura/cabecalho.php';
    date_default_timezone_set('America/Sao_Paulo');
    ?>
  <body>
      <?php
      if(isset($_GET["op"])){
          if($_GET["pg"]=="menu_usuario"){
              include 'usuario/nivel_usuario.php';
          }
          if($_GET["pg"]=="menu_admin"){
              include 'evento/nivel_adm.php';
          }
      }
      ?>
    <div class="container">
        <div class="row">
        <div class="col-xs-12">
          <?php if(!isset($_GET["pg"]) || isset($_GET["pg"]) && $_GET["pg"]!="imprimir"){ include_once 'estrutura/logo.php';} ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
            <section id="corpo">
          <?php 
            date_default_timezone_set('America/Sao_Paulo');
            include 'estrutura/corpo.php';
            ?>
            </section>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <?php if(!isset($_GET["pg"]) || isset($_GET["pg"]) && $_GET["pg"]!="imprimir"){ include 'estrutura/rodape.php';}?> 
        </div>
      </div>
    </div>
  </body>
</html>