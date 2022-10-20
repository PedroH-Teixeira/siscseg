<?php
    $id = $_SESSION['id'];
   
    $busca_id = "SELECT * FROM cadastro_seguranca WHERE id = '$id'";
    $id = $mysqli->query($busca_id) or die($mysqli->error);
  
    while($exibe_id = $id->fetch_array()){
        $id_usuario = $exibe_id["id"];
?>
<form id="formulario" action="index.php?pg=menu_admin&op=Dados" enctype="multipart/form-data" method="post">
<div class="container">
 <div class="col-md-10 col-md-offset-1">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      </thead>
      <tbody>
        <tr>
            <?php if($exibe_id["foto"]==""){ ?>
          <th><label for="imagem">Foto:</label></th>
          <td><input type="file"  name="imagem" id="imagem"/>
              <input type="hidden" name="usuario_admin" value="admin"/>
          <button onclick="form.action='index.php?pg=menu_admin&op=editar_cadastro&acao=foto'; form.submit()">Enviar</button></td>
          <?php }else{ ?> 
          <th>Foto:</th><td id="foto"><img src="imagens/foto/<?php echo $exibe_id["foto"]; ?>" id="previsualizar" class="previsualizar">
                <input type="hidden" name="foto_atual" value="<?php echo $exibe_id["foto"]; ?>"/>
                <input type="hidden" name="usuario_admin" value="admin"/>
                <button onclick="form.action='index.php?pg=menu_admin&op=editar_cadastro&acao=excluir'; form.submit()">Excluir</button></td>
          <?php } ?>
        </tr>
        <tr>
          <th><label for="nome">Nome Completo:</label></th>
          <td><input type="text" onkeyup="maiuscula('nome')" value="<?php echo $exibe_id["nome"]; ?>" name="nome" id="nome" size="50" maxlength="150"/></td>
        </tr>
        <tr>
          <th><label for="nomepai">Nome do pai:</label></th>
          <td><input type="text" onkeyup="maiuscula('nomepai')" value="<?php echo $exibe_id["nomepai"]; ?>" name="nomepai" id="nomepai" size="50" maxlength="60" /></td>
        </tr>
        <tr>
          <th><label for="nomemae">Nome da mãe:</label></th>
          <td><input type="text" onkeyup="maiuscula('nomemae')" value="<?php echo $exibe_id["nomemae"]; ?>" name="nomemae" id="nomemae" size="50" maxlength="60" /></td>
        </tr>
        <tr>
          <th><label for="rg">RG:</label></th>
          <td><input type="text" value="<?php echo $exibe_id["rg"]; ?>" name="rg" id="rg" size="9" maxlength="9" placeholder="0.000-000"/> 
          UF: <select name="uf">
                        <option><?php echo $exibe_id["uf"]; ?></option>
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
          <td><input type="text" value="<?php echo $exibe_id["cpf"]; ?>" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$"name="cpf" id="cpf" size="14" maxlength="14" placeholder="000.000.000-00"/></td>
        </tr>
        <tr>
          <th><label for="telefone">Telefone:</label></th>
          <td><input type="tel" value="<?php echo $exibe_id["telefone"]; ?>" name="telefone" id="celular" size="15" maxlength="15" placeholder="(00)0000-0000"/></td>
        </tr>
        <tr>
          <th><label for="email">Email:</label></th>
          <td><input type="email" value="<?php echo $exibe_id["email"]; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" size="40" maxlength="40" placeholder="exemplo@servidor.com.br"/></td>
        </tr>
        <tr>
            <th><label for="endereco">Endereço:</label> </th>
            <td><input onkeyup="maiuscula('endereco')" type="text" value="<?php echo $exibe_id["endereco"]; ?>" name="endereco" id="endereco" placeholder="Rua ou Avenida" size="20" maxlength="30"/> 
            <input type="text" value="<?php echo $exibe_id["endereco_n"]; ?>" name="endereco_n" id="endereco_n" placeholder="N°" size="2" maxlength="6"/>    
                </td>
        </tr>

        <tr>
            <th> </th>
            <td><input onkeyup="maiuscula('endereco_bairro')" type="text" value="<?php echo $exibe_id["endereco_bairro"]; ?>" name="endereco_bairro" id="endereco_bairro" placeholder="Bairro" size="20" maxlength="30"/> 
            <input onkeyup="maiuscula('endereco_cidade')" type="text" value="<?php echo $exibe_id["endereco_cidade"]; ?>" name="endereco_cidade" id="endereco_cidade" placeholder="Cidade" size="15" maxlength="30"/>
            <select name="endereco_estado">
                        <option><?php echo $exibe_id["endereco_estado"]; ?></option>
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
          <td><input id="Data_nasci" type="date" value="<?php echo $exibe_id["data_nasci"]; ?>" name="data_nasci"/>
          <?php $idade = date("Y-m-d")-$exibe_id["data_nasci"]; echo $idade; ?> anos</td>
        </tr>
        <tr>
          <th><label for="datav">Data de realização do curso de vigilante:</label></th>
          <td><input id="datav" type="date" value="<?php echo $exibe_id["datav"]; ?>" name="datav"/></td>
        </tr>
        <tr>
          <th><label for="datar">Data da reciclagem:</label></th>
          <td><input id="datar" type="date" value="<?php echo $exibe_id["datar"]; ?>" name="datar"/></td>
        </tr>
        <tr>
          <th><label for="curso">Curso de Grandes Eventos:</label></th>
          <td><select name="curso" id="curso">
                <?php 
                      if($exibe_id["curso"]==""){ ?>
                <option>Não</option>
                <option>Sim</option>
                        <?php } 
                      if($exibe_id["curso"]=="Sim"){ ?>
		<option>Não</option>
                <?php } 
                      if($exibe_id["curso"]=="Não"){?>
		<option>Sim</option>
                <?php }?>
	</select></td>
        </tr>
        <tr>
          <th><label for="experiencia">Experiência Profissional:</label></th>
          <td><textarea name="experiencia" id="experiencia" cols="55" rows="10" placeholder="Informe aqui as suas experiências" /><?php echo $exibe_id["experiencia"]; ?></textarea></td>
        </tr>
      </tbody>
    </table>
  </div>
 </div>   
</div>

        <input type="hidden" name="usuario" value="<?php  echo $id_usuario; ?>"/>
        <input type="submit" id="botao-ok" value="Salvar" class="botao">
        
    </form>
    <?php
    } 
    ?>



