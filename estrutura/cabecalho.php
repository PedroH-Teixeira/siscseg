<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="shortcut icon" href="../imagens/tecdin-favicon.png" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<title>SISCSEG</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/sb-admin-2.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.ajaxQueue.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/thickbox-compressed.js"></script>
<script type="text/javascript" src="jquery-autocomplete/jquery.autocomplete.js"></script>
<!--css -->
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css"/>
<!-- Criamos as funções necessárias para envio do formulário -->
 <script type="text/javascript">
     function mudaPagina(){
		setTimeout("window.location='index.php'", 3000);
	}
 	$(document).ready(function(){
		$("#buscar").autocomplete("funcoes/completar_contato.php", {
			width:198,
			selectFirst: false
		});
	});
        $(document).ready(function(){
		$("#cnpj").autocomplete("funcoes/completar_cnpj.php", {
			width:157,
			selectFirst: false
		});
	});
        $(document).ready(function(){
				$("input[name='cnpj']").blur(function(){
					var $razao_social = $("input[name='razao_social']");
					$.getJSON('funcoes/completar_cnpj.php',{ 
						cnpj: $( this ).val() 
					},function( json ){
						$razao_social.val( json.razao_social );
					});
				});
			});
 </script>
<script>
    function maiuscula(id) {
            //palavras para ser ignoradas
            var wordsToIgnore = ["dos", "das", "de", "do"],
            minLength = 2;
            var str = $('#'+id).val(); 
            var getWords = function(str) {
                return str.match(/\S+\s*/g);
            }
            $('#'+id).each(function () {
                var words = getWords(this.value);
                $.each(words, function (i, word) {
                    // somente continua se a palavra nao estiver na lista de ignorados
                    if (wordsToIgnore.indexOf($.trim(word)) == -1 && $.trim(word).length > minLength) {
                        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                    } else{
                    words[i] = words[i].toLowerCase();}
                });
                this.value = words.join("");
            });
        };
    
</script>
</head>
