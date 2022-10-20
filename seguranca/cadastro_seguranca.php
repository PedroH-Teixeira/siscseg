<div class="row">
    <?php
if(isset($_POST["acao"]) && $_POST["acao"]=="inserir"){
// Recuperamos os valores dos campos através do método POST
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
$data_nasci = $_POST['data_nasci'];
$datav = $_POST['datav'];
$datar = $_POST['datar'];
$curso = $_POST['curso'];
$experiencia = $_POST['experiencia'];
$senha_md5 = md5($_POST['senha']);
$data_atual = date("Y-m-d");
// Adicionando a imagem
$pasta = "imagens/foto/";
    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        $nome_imagem    = $_FILES['imagem']['name'];
        $tamanho_imagem = $_FILES['imagem']['size'];
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
            
            if($tamanho < 1024){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem
                
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    
                    $inserir = $mysqli->query("INSERT INTO cadastro_seguranca (foto, nome, nomepai, nomemae, rg,uf, cpf, telefone, email, endereco, endereco_n,endereco_bairro,endereco_cidade,endereco_estado,data_nasci,datav, datar, curso, experiencia,senha,nivel,datacadastro) values ('$nome_atual','$nome','$nomepai','$nomemae','$rg','$uf','$cpf','$telefone','$email','$endereco','$endereco_n','$endereco_bairro','$endereco_cidade','$endereco_estado','$data_nasci','$datav','$datar','$curso','$experiencia','$senha_md5',2,'$data_atual')");
                    if($inserir){
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
                                      <td id="foto" colspan="2"><img src="imagens/foto/<?php echo $nome_atual; ?>" id="previsualizar" class="previsualizar"><!--//imprime a foto na tela--></br></td>
                                  </tr>
                                  <tr>
                                      <th>Nome Completo: </th><td colspan="2"><?php echo $nome?></td>
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
                                    <th></th><td colspan="2"><?php echo $endereco_bairro." - ".$endereco_cidade." - ".$endereco_estado; ?></td>
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
                                    <input type="hidden" name="pg" value="menu_admin">
                                    <button type="submit" name="op" value="eventos" class="botao">OK</button>
                                </form>
                                </div>
<?php
				}else{
                    echo "Falha ao enviar";
                }
            }else{
                echo "A imagem deve ser de no máximo 1MB";
            }
        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
        }
    }else{
        echo "Selecione uma imagem";
        exit;
    }
}else{
?>

<form id="formulario" action="index.php?pg=menu_admin&op=seguranca&acao=enviar" enctype="multipart/form-data" method="post">
 <div class="col-md-8 col-md-offset-2">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      </thead>
      <tbody>
        <tr>
          <th><label for="imagem">Foto:</label></th>
          <td><input type="file"  name="imagem" id="imagem"/></td>
        </tr>
        <tr>
          <th><label for="nome">Nome Completo:</label></th>
          <td><input onkeyup="maiuscula('nome')" type="text" name="nome" id="nome" size="50" maxlength="150"/></td>
        </tr>
        <tr>
          <th><label for="nomepai">Nome do pai:</label></th>
          <td><input onkeyup="maiuscula('nomepai')" type="text" name="nomepai" id="nomepai" size="50" maxlength="60" /></td>
        </tr>
        <tr>
          <th><label for="nomemae">Nome da mãe:</label></th>
          <td><input onkeyup="maiuscula('nomemae')" type="text" name="nomemae" id="nomemae" size="50" maxlength="60" /></td>
        </tr>
        <tr>
          <th><label for="rg">RG:</label></th>
          <td><input type="text" name="rg" id="rg" size="9" maxlength="9" placeholder="0.000-000"/> 
          UF: <select name="uf">
                        <option></option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                </select>
          </td>
        </tr>
        <tr>
          <th><label for="cpf">CPF:</label></th>
          <td><input type="text" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$"name="cpf" id="cpf" size="14" maxlength="14" placeholder="000.000.000-00"/></td>
        </tr>
        <tr>
          <th><label for="telefone">Telefone:</label></th>
          <td><input type="tel" name="telefone" id="celular" size="15" maxlength="15" placeholder="(00)0000-0000"/></td>
        </tr>
        <tr>
          <th><label for="email">Email:</label></th>
          <td><input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" size="40" maxlength="40" placeholder="exemplo@servidor.com.br"/></td>
        </tr>
        <tr>
            <th><label for="endereco">Endereço:</label> </th>
            <td><input onkeyup="maiuscula('endereco')" type="text" name="endereco" id="endereco" placeholder="Rua ou Avenida" size="20" maxlength="30"/> 
            <input type="text" name="endereco_n" id="endereco_n" placeholder="N°" size="2" maxlength="6"/>    
                </td>
        </tr>

        <tr>
            <th> </th>
            <td><input onkeyup="maiuscula('endereco_bairro')" type="text" name="endereco_bairro" id="endereco_bairro" placeholder="Bairro" size="20" maxlength="30"/> 
            <input onkeyup="maiuscula('endereco_cidade')" type="text" name="endereco_cidade" id="endereco_cidade" placeholder="Cidade" size="15" maxlength="30"/>
            <select name="endereco_estado">
                        <option></option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                </select></td>
        </tr>
        <tr>
          <th><label for="data_nasci">Data de nascimento:</label> </th>
          <td><input id="Data_nasci" type="date" name="data_nasci"/></td>
        </tr>
        <tr>
          <th><label for="datav">Data de realização do curso de vigilante:</label></th>
          <td><input id="datav" type="date" name="datav"/></td>
        </tr>
        <tr>
          <th><label for="datar">Data da reciclagem:</label></th>
          <td><input id="datar" type="date" name="datar"/></td>
        </tr>
        <tr>
          <th><label for="curso">Curso de Grandes Eventos:</label></th>
          <td><select name="curso" id="curso">
                <option></option>
		<option>Não</option>
		<option>Sim</option>
	</select></td>
        </tr>
        <tr>
          <th><label for="experiencia">Experiência Profissional:</label></th>
          <td><textarea name="experiencia" id="experiencia" cols="55" rows="10" placeholder="Informe aqui as suas experiências" /></textarea></td>
        </tr>
        <tr>
          <th><label for="senha">Senha:</label></th>
          <td><input id="senha" type="password" name="senha" required/></td>
        </tr>
      </tbody>
    </table>
  </div>
 </div>
<div class="col-md-4 col-md-offset-4 text-center">
    <input type="hidden" name="acao" value="inserir">
        <input type="submit"  value="Enviar" class="botao">
</div>
    </form>
</div>

<?php
}
?>