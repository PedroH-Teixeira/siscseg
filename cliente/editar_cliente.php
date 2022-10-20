
    <div class="col-md-8 col-md-offset-2">
       
        <div class="table-responsive">
            
            <table class="table table-striped">
                <thead>
      </thead>
      <tbody>
      <form method="post">
          <tr><th><label for="id_cliente">Cod. Identificador:</label></th>
        <td><input type="text" name="id_cliente" id="id_cliente" size="4" maxlength="7" required/><input type="submit" value="Buscar Cliente"></td>
          </tr>
          </tbody>
    </table>
  </div>
  </div>
          
      </form>
      <?php 
      
      if(isset($_POST["id_cliente"])){
         $id_cliente = $_POST["id_cliente"]; 
         $sql = mysqli_query($mysqli,"SELECT * FROM cadastro_cliente WHERE id = '$id_cliente' LIMIT 1");
         while($exibe = $sql->fetch_array()){
         
      
      ?>
      <form id="formulario" action="index.php?pg=menu_admin&op=cliente&acao=enviar" method="post">
             <div class="col-md-8 col-md-offset-2">
       
        <div class="table-responsive">
            
            <table class="table table-striped">
                <thead>
      </thead>
      <tbody>
         <tr><th><label for="nome_fantasia">Nome Fantasia:</label></th>
        <td><input value="<?php echo $exibe["nome_fantasia"]; ?>" type="text" name="nome_fantasia" id="nome_fantasia" size="40" maxlength="60" required/></td></tr>
          
        <tr><th><label for="razao">Razão Social:</label></th>
        <td><input value="<?php echo $exibe["razao_social"]; ?>" type="text" name="razao" id="razao" size="40" maxlength="60" required/></td></tr>

	<tr><th><label for="cnpj">CNPJ:</label> </th>
	<td><input value="<?php echo $exibe["cnpj"]; ?>" type="text" pattern="^\d{2}.\d{3}.\d{3}/\d{4}-\d{2}$" name="cnpj" id="cnpj_cliente" size="18" maxlength="18" placeholder="00.000.000/0000-00" required/></td></tr>

	<tr><th><label for="email">Email:</label> </th>
	<td><input value="<?php echo $exibe["email"]; ?>" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" size="40" maxlength="40" placeholder="exemplo@servidor.com.br" required/></td></tr>
        
	<tr><th><label for="telefone">Telefone:</label> </th>
	<td><input value="<?php echo $exibe["telefone"]; ?>" type="tel" name="telefone" id="celular" size="15" maxlength="15" placeholder="(00)0000-0000" required/></td></tr>

	<tr><th><label for="endereco">Endereço:</label> </th>
            <td><input value="<?php echo $exibe["endereco"]; ?>" type="text" name="endereco" id="endereco" placeholder="Rua ou Avenida" size="20" maxlength="30" required/> 
            <input value="<?php echo $exibe["endereco_n"]; ?>" type="text" name="endereco_n" id="endereco_n" placeholder="N°" size="2" maxlength="6" required/>    
                </td></tr>

        <tr><th></th>
            <td><input value="<?php echo $exibe["endereco_bairro"]; ?>" type="text" name="endereco_bairro" id="endereco_bairro" placeholder="Bairro" size="20" maxlength="30" required/> 
            <input value="<?php echo $exibe["endereco_cidade"]; ?>" type="text" name="endereco_cidade" id="endereco_cidade" placeholder="Cidade" size="15" maxlength="30" required/>
            <select name="endereco_estado" required>
                        <option><?php echo $exibe["endereco_estado"]; ?></option>
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
             </td></tr>
        
        <tr><th></th><td><input value="<?php echo $exibe["end_complemento"]; ?>" type="text" name="end_complemento" id="end_complemento" placeholder="Complemento" size="40" maxlength="200"/></td></tr>

	<tr><th><label for="nome_responsavel">Nome do Responsável:</label> </th>
	<td><input value="<?php echo $exibe["nome_responsavel"]; ?>" type="text" name="nome_responsavel" id="nome_responsavel" size="40" maxlength="50" required/></td></tr>

	<tr><th><label for="cargo">Cargo:</label> </th>
	<td><input value="<?php echo $exibe["cargo"]; ?>" type="text" name="cargo" id="cargo" size="40" maxlength="40" required/></td></tr>

	<tr><th><label for="cpf">CPF:</label> </th>
	<td><input value="<?php echo $exibe["cpf"]; ?>" type="text" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$" name="cpf" id="cpf" size="14" maxlength="14" placeholder="000.000.000-00" required/></td></tr>

	<tr><th><label for="rg">RG:</label> </th>
	<td><input value="<?php echo $exibe["rg"]; ?>" type="text" name="rg" id="rg" size="9" maxlength="9" placeholder="0.000-000" required/></td></tr>

        <tr><th><label for="email_responsavel">Email:</label> </th>
	<td><input value="<?php echo $exibe["email_responsavel"]; ?>" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email_responsavel" id="email_responsavel" size="40" maxlength="40" placeholder="exemplo@servidor.com.br" required/></td></tr>
        
        <tr><th><label for="cep">CEP:</label> </th>
	<td><input value="<?php echo $exibe["cep"]; ?>" type="text" name="cep" id="cep" size="10" maxlength="10" placeholder="00.000-000" required/></td></tr>
        
        <tr><th><label for="end_responsavel">Endereço Residêncial:</label> </th>
            <td><input value="<?php echo $exibe["end_responsavel"]; ?>" type="text" name="end_responsavel" id="end_responsavel" placeholder="Rua ou Avenida" size="20" maxlength="30" required/> 
            <input value="<?php echo $exibe["end_responsavel_n"]; ?>" type="text" name="end_responsavel_n" id="end_responsavel_n" placeholder="N°" size="2" maxlength="6" required/>    
                </td></tr>

        <tr><th> </th>
            <td><input value="<?php echo $exibe["end_responsavel_bairro"]; ?>" type="text" name="end_responsavel_bairro" id="end_responsavel_bairro" placeholder="Bairro" size="20" maxlength="30" required/> 
            <input value="<?php echo $exibe["end_responsavel_cidade"]; ?>" type="text" name="end_responsavel_cidade" id="end_responsavel_cidade" placeholder="Cidade" size="15" maxlength="30" required/>
            <select name="end_responsavel_estado" required>
                        <option><?php echo $exibe["end_responsavel_estado"]; ?></option>
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
             </td></tr
        
        <tr><th></th><td><input value="<?php echo $exibe["end_resp_complemento"]; ?>" type="text" name="end_resp_complemento" id="end_resp_complemento" placeholder="Complemento" size="40" maxlength="200"/></td></tr>
</tbody>
    </table>
  </div>
  </div>
          <input type="hidden" name="id" value="<?php echo $exibe["id"]; ?>">
          <input type="hidden" name="acao" value="editar">
<input type="submit" id="botao-ok" value="Salvar"class="botao"/>
    </form> 
      <?php
         }
      }
      ?>