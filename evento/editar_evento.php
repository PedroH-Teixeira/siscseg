
    <div class="col-md-8 col-md-offset-2">
       
        <div class="table-responsive">
            
            <table class="table table-striped">
                <thead>
      </thead>
      <tbody>
      <form method="post">
          <tr><th><label for="id_cliente">Cod. Identificador:</label></th>
        <td><input type="text" name="id_cliente" id="id_cliente" size="4" maxlength="7"/><input type="submit" value="Buscar Evento"></td>
          </tr>
          </tbody>
    </table>
  </div>
  </div>
</form>
      <?php 
      
      if(isset($_POST["id_cliente"])){
         $id_cliente = $_POST["id_cliente"]; 
         $sql = mysqli_query($mysqli,"SELECT * FROM controle_servico s JOIN cadastro_cliente c ON s.id_organizador = c.id WHERE id_c = '$id_cliente' LIMIT 1");
         while($exibe = $sql->fetch_array()){
         
      
      ?>
    
<div class="col-md-8 col-md-offset-2">
        
    
    <form id="formulario" action="index.php?pg=menu_admin&op=evento&acao=enviar" method="post">
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            </thead>
                <tbody>
	<tr><th><label for="cnpj">CNPJ do Organizador:</label> </th>
            <td><input value="<?php echo $exibe["cnpj"]; ?>" type="text" pattern="^\d{2}.\d{3}.\d{3}/\d{4}-\d{2}$" name="cnpj" id="cnpj" size="18" maxlength="18" placeholder="00.000.000/0000-00" required/></td></tr>
        
        <tr><th>Organizador:</th>
            <td><input value="<?php echo $exibe["nome_fantasia"]; ?>" type="text" name="razao_social" id="razao_social" size="40" maxlength="60" readonly/></td></tr>
        
        <tr><th><label for="nome_evento">Nome do Evento:</label></th>
            <td><input value="<?php echo $exibe["nome_evento"]; ?>" type="text" name="nome_evento" id="nome_evento" size="40" maxlength="60" required/></td></tr>
        
        <tr><th><label for="vagas">Quantidade de Vagas:</label></th>
            <td><input value="<?php echo $exibe["vagas"]; ?>" type="text" name="vagas" id="vagas" size="4" maxlength="5" required/></td></tr>

	<tr><th><label for="endereco_evento">Endereço do local:</label> </th>
            <td><input value="<?php echo $exibe["endereco_evento"]; ?>" type="text" name="endereco_evento" id="endereco_evento" placeholder="Rua ou Avenida" size="20" maxlength="30" required/> 
                <input value="<?php echo $exibe["endereco_evento_n"]; ?>" type="text" name="endereco_evento_n" id="endereco_evento_n" placeholder="N°" size="2" maxlength="6" required/>    
                </td></tr>

        <tr><th> </th>
            <td><input value="<?php echo $exibe["endereco_evento_bairro"]; ?>" type="text" name="endereco_evento_bairro" id="endereco_evento_bairro" placeholder="Bairro" size="20" maxlength="30" required/> 
                <input value="<?php echo $exibe["endereco_evento_cidade"]; ?>" type="text" name="endereco_evento_cidade" id="endereco_evento_cidade" placeholder="Cidade" size="15" maxlength="30" required/>
            <select name="endereco_evento_estado" required>
                        <option><?php echo $exibe["endereco_evento_estado"]; ?></option>
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
        <tr><th></th><td><input value="<?php echo $exibe["end_evento_complemento"]; ?>" type="text" name="end_evento_complemento" id="end_evento_complemento" placeholder="Complemento" size="40" maxlength="200"/></td></tr>
        <tr><th><label for="hora">Horário:</label></th>
	<td><select name="hora" id="hora">
                <option><?php echo $exibe["hora"]; ?></option>
		<option>09:00</option>
		<option>09:30</option>
		<option>10:00</option>
		<option>10:30</option>
		<option>11:00</option>
		<option>11:30</option>
		<option>12:00</option>
		<option>12:30</option>
		<option>13:00</option>
		<option>13:30</option>
		<option>14:00</option>
		<option>14:30</option>
		<option>15:00</option>
		<option>15:30</option>
		<option>16:00</option>
		<option>16:30</option>
		<option>17:00</option>
		<option>17:30</option>
		<option>18:00</option>
		<option>18:30</option>
		<option>19:00</option>
		<option>19:30</option>
		<option>20:00</option>
		<option>20:30</option>
		<option>21:00</option>
		<option>21:30</option>
		<option>22:00</option>
	</select></td></tr>

	<tr><th><label for="data">Data: </label></th>
            <td><input value="<?php echo $exibe["data"]; ?>" type="date" name="data" id="data" required> </td></tr>

        <tr><th><label for="tipo">Tipo de Evento:</label></th>
	<td><select name="tipo" id="tipo">
                <option><?php echo $exibe["tipo"]; ?></option>
		<option>Evento Privado</option>
		<option>Evento Público</option>
		<option>Feira</option>
		<option>Congresso</option>
		<option>Outros</option>
	</select> </td></tr>
    
    <tr><th><label for="observacao">Observação:</label> </th>
	<td><textarea name="observacao" id="observacao" cols="40" rows="5" /><?php echo $exibe["observacao"]; ?></textarea></td></tr>
        </tbody>
    </table>
  </div>
        <input type="hidden" name="id" value="<?php echo $exibe["id_c"]; ?>">
          <input type="hidden" name="acao" value="editar">
        <input type="submit" id="botao-ok" value="Salvar" class="botao"/>
    </form>
    </div>
 <?php
         }
      }
      ?>