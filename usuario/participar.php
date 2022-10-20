
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
<?php
$codigo_evento = $_POST["codigo_evento"];

$busca_evento = "SELECT id_evento FROM trabalho_evento WHERE id_evento = '$codigo_evento' AND trabalhou='Sim'";
    $quant_vagas = mysqli_query($mysqli,$busca_evento);
	$count = mysqli_fetch_array($quant_vagas,MYSQLI_ASSOC);
	$vagas = mysqli_num_rows($quant_vagas);
        
$sql = mysqli_query($mysqli,"SELECT vagas FROM controle_servico WHERE id_c = '$codigo_evento'");
$query = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$disponiveis = $query["vagas"]-$vagas;

if($disponiveis>=1){
    




if(isset($_GET["acao"]) && $_GET["acao"]=="SIM"){


$codigo_usuario = $_POST["codigo_usuario"];
$confirma = $_POST["confirma"];

        $sql_query = "SELECT * FROM trabalho_evento WHERE id_seguranca = '$codigo_usuario' AND id_evento = '$codigo_evento'";
	$result = mysqli_query($mysqli,$sql_query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
        if($count >= 1)
	{
            if($row["trabalhou"]=="Sim"){
                echo "A sua participação nesse evento já foi confirmada.";
            }elseif($row["trabalhou"]=="Não"){
                echo "Você já está inscrito nesse evento e a sua participação está sendo avaliada!</br>"
                ."Fique atento no e-mail cadastrado, pois assim que avaliado será enviado uma confirmação.";
            }else{
                echo "A sua participação para esse evento não foi efetivada.<br>Boa sorte na próxima!";
            }
            
        } else {
           
                $inserir = $mysqli->query("INSERT INTO trabalho_evento (id_seguranca, id_evento, trabalhou) VALUES ('$codigo_usuario','$codigo_evento','$confirma')");
                if($inserir){
                    echo "<p>Você concluiu a sua participação nesse evento e está em processo de avaliação.</p></br>"
                    ."Fique atento no e-mail cadastrado, pois assim que avaliado será enviado uma confirmação.";
                    $mysqli->close(); //Fecha a execução da query
                } else {
                    echo 'Erro: ', $mysqli->error;//Exibe o erro
                }
        }
?>
    <form>
        <input type="hidden" name="pg" value="menu_usuario">
        <button type="submit" name="op" value="eventos" id="botao-ok" class="botao">OK</button>
    </form>  
<?php
}else{
 $codigo_evento = $_POST["codigo_evento"];
 $codigo_usuario = $_POST["codigo_usuario"];
$busca_rg = "SELECT rg FROM cadastro_seguranca WHERE id = '$codigo_usuario'";
$rg = $mysqli->query($busca_rg) or die($mysqli->error);
while($exibe = $rg->fetch_array()){
    $rg_zero = $exibe['rg'];
}
if($rg_zero !=0){
?>
      
    <table class="table table-striped">
     <thead>
      </thead>
      <tbody>
        <tr><td><p>TERMO DE APRESENTAÇÃO, CONHECIMENTO, COMPROMISSO E ACEITE</p>
<p>O Sistema SISCSEG – SISTEMA DE CADASTRO DE SEGURANÇA tem finalidade de gerenciar seleção de efetivo para atuação em eventos ou para contratação em empresas de Segurança e Vigilância.</p>
<p>Após o cadastro no SISCSEG o usuário deverá selecionar o EVENTO que deseja participar e fazer sua inscrição é importante ressaltar, que sua inscrição será avaliada, podendo ser DEFERIDA ou INDEFERIDA.</p>
<p>Os dados inseridos no cadastro devem ser verdadeiros, sob pena de exclusão do banco de dados e restrição a novo cadastro.</p>
<p>A fotografia deverá ser recente e com roupa adequada.</p>
<p>O Cadastro não gera obrigação de contratação, apenas expectativa, pois é preciso ser avaliado e aprovado.</p>
<p>Caso o número de inscrição seja superior ao número de vagas disponíveis para o evento selecionado, haverá seleção de escolha com critérios de desempate.</p>
<p>Os critérios de desempates serão adotados da seguinte forma: experiência em autuação em eventos, apresentação pessoal, assiduidade, uso devido de uniforme, idade e comportamento.</p>
<p>A apresentação pessoal será levada em consideração, portanto não exagere em cortes de cabelo, uso de joias ou bijuterias.</p>
<p>O usuário afirma ter lido e concordado com as informações e declara que faz seu cadastro de forma livre e espontânea vontade.</p>
            </td></tr>
        
        
    </tbody>
    </table>
        <div class="col-md-4 col-md-offset-4 text-center">
    <form action="index.php?pg=menu_usuario&op=Participar&acao=SIM" method="post">
        <input type="hidden" name="confirma" value="Não"/>
        <input type="hidden" name="codigo_evento" value="<?php echo $codigo_evento; ?>"/>
        <input type="hidden" name="codigo_usuario" value="<?php echo $codigo_usuario; ?>"/>
        <button type="submit" formaction="index.php?pg=menu_usuario&op=Participar&acao=NAO" name="" class="botao">Voltar</button>
        <button type="submit" value="" name="" id="" class="botao" />Aceito</button>
    </form>
        </div>
 <?php
} else {
    echo "Para participar de um evento você precisa finalizar o seu cadastro.";
?>
    <form>
        <input type="hidden" name="pg" value="menu_usuario">
        <button type="submit" name="op" value="eventos" id="botao-ok" class="botao">OK</button>
    </form>
    
 <?php
}
}
} else {
    echo "Todas as vagas para esse evento já foram preenchidas.";
}
 ?>
        </div>
    </div>