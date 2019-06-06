<?php
    if($_SESSION['tipo'] != 1)header('location:'.URL_BASE);
?>
<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'admin'?>">Administrativo</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'funcionario'?>">Funcionários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?> Funcionário</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light"><?=$title?> Funcionário</h1>
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
            <form action="<?= URL_BASE.'funcionario/salvar' ?>" method="POST">
                <fieldset class="form-group border rounded p-5">
                    <legend class="mb-4 font-weight-normal">Dados do cliente:</legend>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?=isset($funcionario['nome']) ? $funcionario['nome'] : ''?>" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                        <label for="cpf">CPF</label>
                            <input class="form-control cpf" type="text" id="cpf" name="cpf" value="<?=isset($funcionario['cpf']) ? $funcionario['cpf'] : ''?>" placeholder="Digite seu CPF">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="endereco">Endereço</label>
                            <input class="form-control" type="text" id="endereco" name="endereco" value="<?=isset($funcionario['endereco']) ? $funcionario['endereco'] : ''?>" placeholder="Digite seu Endereço">
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="cidade">Cidade</label>
                            <input class="form-control" type="text" id="cidade" name="cidade" value="<?=isset($funcionario['cidade']) ? $funcionario['cidade'] : ''?>" placeholder="Digite seu Cidade">
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="estado">Estado</label>
                            <input class="form-control" type="text" id="estado" name="estado" value="<?=isset($funcionario['estado']) ? $funcionario['estado'] : ''?>" placeholder="Digite seu Estado">
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="cep">CEP</label>
                            <input class="form-control cep" type="text" id="cep" name="cep" value="<?=isset($funcionario['cep']) ? $funcionario['cep'] : ''?>" placeholder="Digite seu CEP">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="<?=isset($funcionario['email']) ? $funcionario['email'] : ''?>" placeholder="Digite seu Email">
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                        <label for="telefone">Telefone</label>
                            <input class="form-control tel" type="text" id="telefone" name="telefone" value="<?=isset($funcionario['telefone']) ? $funcionario['telefone'] : ''?>" placeholder="Digite seu Telefone">
                            <input type="hidden" name="id" value="<?= isset($funcionario['id']) ? $funcionario['id'] : '';?>">
                        </div>
                    </div>
                </fieldset>
                <div class="form-row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit"><?=$btn?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>