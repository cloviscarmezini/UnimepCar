<?php
    if($_SESSION['tipo'] != 1)header('location:'.URL_BASE);
?>
<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'admin'?>">Administrativo</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'usuario'?>">Usuario</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?> Usuário</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light"><?=$title?> Usuário</h1>
        </div>
    </div>
    <?php
        if(isset($erros)){
        ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Por favor, preencha os campos corretamente!</h4>
                    <p>Os campos abaixo não foram preenchidos corretamente:</p>
                    <hr>
        <?php
                foreach ($erros as $erro){
                    echo '<p class="mb-0"> - '.$erro.'.</p>';
                }
            echo '</div></div></div>';
        }       ?>
    <div class="row justify-content-center mb-5 <?=isset($erros) ? 'mt-2' : 'mt-5'?>">
        <div class="col-12">
            <form action="<?= URL_BASE.'usuario/salvar' ?>" method="POST">
                <fieldset class="form-group border rounded p-5">
                    <legend class="mb-4 font-weight-normal">Dados do usuário:</legend>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="usuario">Usuário</label>
                            <input class="form-control" type="text" id="usuario" name="usuario" value="<?=isset($usuario['usuario']) ? $usuario['usuario'] : ''?>" placeholder="Digite seu Usuário">
                        </div>
                        <?= !isset($usuario['id']) ? '<div class="form-group col-sm-12 col-md-4">
                            <label for="senha">Senha</label>
                            <input class="form-control" type="password" id="senha" name="senha" placeholder="Digite sua senha"></div>' : '' 
                        ?>
                        <div class="form-group col-sm-12 col-md-4">
                        <label for="tipo">Tipo de usuário</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="0">Selecione...</option>
                                <option value="1" <?=(isset($usuario['tipo']) && $usuario['tipo'] == 1 ? 'selected':'' )?>>Administrador</option>
                                <option value="2" <?=(isset($usuario['tipo']) && $usuario['tipo'] == 2 ? 'selected':'' )?>>Usuário</option>
                            </select>
                            <input class="form-control" type="hidden" id="tipo" name="id" value="<?=isset($usuario['id']) ? $usuario['id'] : 0?>" placeholder="Digite seu tipo">
                        </div>
                    </div>
                </fieldset>
                <div class="form-row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit"><?=$btn?></button>
                        <?= isset($usuario['id']) ? '<a href="#" class="btn btn-warning modal_btn" data-toggle="modal" data-target="#senhaModal">Alterar senha</i></a>' : '' ?>
                        <?= isset($usuario['id']) ? '<a href="#" class="btn btn-danger modal_btn" data-toggle="modal" data-target="#resetarModal">Resetar senha</i></a>' : '' ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal alterar senha -->
<div class="modal fade" id="senhaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar senha</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-danger d-none" id="retorno-campos" role="alert">
                Preencha os campos corretamente!
            </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-12 col-md-8">
                        <label for="senhaAtual">Senha antiga</label>
                        <input type="hidden" id="id_usuario" value="<?=$usuario['id']?>">
                        <input class="form-control" type="text" id="senhaAtual" name="senha_atual" placeholder="Digite sua senha antiga">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-12 col-md-8">
                        <label for="senhaNova">Senha nova</label>
                        <input class="form-control" type="text" id="senhaNova" name="senhaNova" placeholder="Digite sua senha nova">
                    </div>
                </div>
                <div class="container-fluid text-center">
                    <button class="btn btn-warning" id="troca_senha">Alterar senha</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal reseta senha-->
<div class="modal fade" id="resetarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja resetar a senha?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'usuario/reseta_senha/'.$usuario['id']?>" class="btn btn-danger">Resetar</a>
                    <a tabindex="0" class="btn btn-primary" role="button" data-toggle="popover" data-placemente="right" data-trigger="focus" title="Senha nova" data-content="sua senha nova será 12345">Ajuda</a>
                </div>
            </div>
        </div>
    </div>
</div>