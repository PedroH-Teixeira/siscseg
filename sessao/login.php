<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        
                        <form method="post" action="index.php?pg=login_autenticacao" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input  class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                </div>
                                
                                <button type="submit" name="login" value="true" class="btn btn-success btn-block">Login</button>
                                <button type="submit" formaction="index.php?pg=cadastro_usuario" name="cadastrar" value="true" class="btn btn-success btn-block">Cadastrar</button>
                                <button type="submit" formaction="index.php?pg=recuperar_senha" name="recuperar" value="true" class="btn btn-success btn-block">Recuperar Senha</button>
                        </fieldset> 
                            
                        </form>
                        
                    </div>
                </div>
            </div>
</div>