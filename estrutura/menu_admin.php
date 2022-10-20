<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<div class="row">
        <div class="col-md-12">
	<header id="cabecalho">
        <nav class="menu">
            <ul class="menu-list">
                <li>
                    <a href="#">Eventos</a>
                    <ul class="sub-menu">
                        <li><a href="index.php?pg=menu_admin&op=eventos">Relação</a></li>
                        <li><a href="index.php?pg=menu_admin&op=evento&acao=">Incluir</a></li>
                        <li><a href="index.php?pg=menu_admin&op=evento&acao=editar">Editar</a></li>
                        <li><a href="index.php?pg=menu_admin&op=controle&acao=">Histórico</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Clientes</a>
                    <ul class="sub-menu">
                        <li><a href="index.php?pg=menu_admin&op=cliente&acao=">Adicionar</a></li>
                        <li><a href="index.php?pg=menu_admin&op=cliente&acao=editar">Editar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Seguranças</a>
                    <ul class="sub-menu">
                        <li><a href="index.php?pg=menu_admin&op=seguranca&acao=">Cadastrar</a></li>
                        <li><a href="index.php?pg=menu_admin&op=seguranca&acao=editar">Editar</a></li>
                        <li><a href="index.php?pg=menu_admin&op=lista_efetivo">Efetivo</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Usuário</a>
                    <ul class="sub-menu">
                        <li><a href="index.php?pg=menu_admin&op=editar_cadastro">Editar</a></li>
                        <li><a href="index.php?pg=menu_admin&op=alterar_senha">Alterar Senha</a></li>
                    </ul>
                </li>
                
                <li class="buscar"><form id="buscarcontato" action="index.php?pg=menu_admin&op=buscar" name="buscarcontato" method="post">
                    <input type="text" name="buscar" id="buscar" size="20" maxlength="50" placeholder="Buscar contato..."/>
                    </form>
		</li>
            </ul>
	</nav>
	</header>
        </div>
</div>
<br>