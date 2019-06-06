<form action="<?= URL_BASE.'login/autentica' ?>" method="POST">                
    <?php
        if(isset($erro)){
            echo '
            <div class="row">
                <div class="col-sm-12 text-center alert alert-danger">
                    E-mail ou senha inválidos
                </div>
            </div>';
        }
    ?>
    <div class="form-row">
        <div class="form-group col-sm-12">
            <label for="usuario">Usuário</label>
            <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Digite seu usuário">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-12">
            <label for="senha">Senha</label>
            <input class="form-control" type="password" id="senha" name="senha" placeholder="Digite sua senha">
        </div>
    </div>
    <div class="form-row mt-2 mb-3">
        <div class="col-sm-12 text-center">
            <button class="btn btn-primary btn-block" type="submit">Entrar</button>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 text-center">
            <a href="">Esqueci minha senha</a>
        </div>
    </div>
</form>