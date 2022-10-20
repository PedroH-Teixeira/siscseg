<div class="row">
<?php
// Recuperamos os valores dos campos através do método POST
if(!isset($_POST["foto_atual"])){
    echo "A sua foto não foi enviada! "
    ."Retorne a página &quotEditar&quot para escolher novamente a imagem e não esqueça de clicar em &quotEnviar&quot." ;
    $_POST["foto_atual"] = "";
    $foto_atual = $_POST["foto_atual"];
}else{
    $foto_atual = $_POST["foto_atual"];
}

$nome = $_POST['nome'];
$nomepai = $_POST['nomepai'];
$nomemae = $_POST['nomemae'];
$rg = $_POST['rg'];
$uf = $_POST['uf'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$endereco_n = $_POST['endereco_n'];
$endereco_bairro = $_POST['endereco_bairro'];
$endereco_cidade = $_POST['endereco_cidade'];
$endereco_estado = $_POST['endereco_estado'];
$end_complemento = $_POST["end_complemento"];
$data_nasci = $_POST['data_nasci'];
$datav = $_POST['datav'];
$datar = $_POST['datar'];
$curso = $_POST['curso'];
$experiencia = $_POST['experiencia'];
                    
                    $id_usuario = $_POST['usuario'];
                    
                    $inserir = $mysqli->query("UPDATE cadastro_seguranca SET nome='$nome', nomepai='$nomepai', nomemae='$nomemae', rg='$rg', uf='$uf', cpf='$cpf', telefone='$telefone', email='$email', endereco='$endereco', endereco_n='$endereco_n', endereco_bairro='$endereco_bairro', endereco_cidade='$endereco_cidade', endereco_estado='$endereco_estado',end_complemento='$end_complemento', data_nasci='$data_nasci', datav='$datav', datar='$datar', curso='$curso', experiencia='$experiencia' WHERE id='$id_usuario'");
                    if($inserir){
                        $_SESSION["nome"] = $nome;
                        $_SESSION["email"] = $email;
                        $mysqli->close(); //Fecha a execução da query
                    } else {
                        echo 'Erro: ', $mysqli->error;//Exibe o erro
                    }
                                
?>
                                
                                
                            <div class="col-md-8 col-md-offset-2">   
                                <h2>Enviado com sucesso!</h2>
                             
                              <div class="table-responsive">
                                <table class="table table-striped ">
                                 <thead>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <th class="col-md-5">Foto:</th>
                                      <td id="foto" colspan="2"><img src="imagens/foto/<?php echo $foto_atual; ?>" id="previsualizar" class="previsualizar"><!--//imprime a foto na tela--></br></td>
                                  </tr>
                                  <tr>
                                      <th>Nome Completo: </th><td colspan="2"><?php echo $nome;?></td>
                                  </tr>
                                  <tr>
                                      <th>Nome do Pai: </th><td colspan="2"><?php echo $nomepai; ?></td>
                                  </tr>
                                <tr>
                                    <th>Nome da Mãe: </th><td colspan="2"><?php echo $nomemae; ?></td>
                                </tr>
				<tr>
                                    <th>RG: </th><td colspan="2"><?php echo $rg; ?></td>
                                </tr>
				<tr>
                                    <th>CPF: </th><td colspan="2"><?php echo $cpf; ?></td>
                                </tr>
				<tr>
                                    <th>Telefone: </th><td colspan="2"><?php echo $telefone; ?></td>
                                </tr>
				<tr>
                                    <th>E-mail: </th><td colspan="2"><?php echo $email; ?></td>
                                </tr>
				<tr>
                                    <th>Endereço: </th><td colspan="2"><?php echo $endereco." N°: ". $endereco_n; ?></td>
                                </tr>
                                <tr>
                                    <th></th><td colspan="2"><?php echo $endereco_bairro.", ".$endereco_cidade." - ".$endereco_estado; ?></td>
                                </tr>
                                <tr>
                                    <th></th><td colspan="2"><?php echo $end_complemento; ?></td>
                                </tr>
                                <tr>
                                    <th>Data de Nascimento: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($data_nasci)); ?></td>
                                </tr>
				<tr>
                                    <th>Data de realização do curso de vigilante: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($datav)); ?></td>
                                </tr>
				<tr>
                                    <th>Data Reciclagem: </th><td colspan="2"><?php echo date('d/m/Y', strtotime($datar)); ?></td>
                                </tr>
				<tr>
                                    <th>Curso: </th><td colspan="2"><?php echo $curso; ?></p></td>
                                </tr>
				<tr>
                                    <th>Experiências Profissionais: </th><td colspan="2"><?php echo $experiencia; ?></td>
                                </tr>
                                </tbody>
                                </table>
                              </div>
                             </div> 
                             <div class="col-md-4 col-md-offset-4 text-center">
                                <form>
                                    <?php if($_SESSION["nivel"]==2){ ?>
                                    <input type="hidden" name="pg" value="menu_usuario">
                                    <?php }else{ ?>
                                    <input type="hidden" name="pg" value="menu_admin">  
                                    <?php }?>
                                    <button type="submit" name="op" value="eventos" class="botao">OK</button>
                                </form>
                             </div>
                            </div>
