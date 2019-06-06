<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'cliente'?>">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dados cliente</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light">Dados Cliente</h1>
        </div>
    </div>
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-12">
            <fieldset class="form-group border rounded p-5">
                <legend class="mb-4 font-weight-normal">Dados do cliente:</legend>
                <div class="form-row mb-4 border-bottom">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="font-weight-bolder" for="nome">Nome</label>
                        <input class="form-control-plaintext" type="text" id="nome" name="nome" value="<?=isset($cliente['nome']) ? $cliente['nome'] : ''?>" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                    <label class="font-weight-bolder" for="cpf">CPF</label>
                        <input class="form-control-plaintext" type="text" id="cpf" name="cpf" value="<?=isset($cliente['cpf']) ? $cliente['cpf'] : ''?>" readonly>
                    </div>
                </div>
                <div class="form-row mb-4 border-bottom">
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="font-weight-bolder" for="endereco">Endereço</label>
                        <input class="form-control-plaintext" type="text" id="endereco" name="endereco" value="<?=isset($cliente['endereco']) ? $cliente['endereco'] : ''?>" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class="font-weight-bolder" for="cidade">Cidade</label>
                        <input class="form-control-plaintext" type="text" id="cidade" name="cidade" value="<?=isset($cliente['cidade']) ? $cliente['cidade'] : ''?>" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="font-weight-bolder" for="estado">Estado</label>
                        <input class="form-control-plaintext" type="text" id="estado" name="estado" value="<?=isset($cliente['estado']) ? $cliente['estado'] : ''?>" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label class="font-weight-bolder" for="cep">CEP</label>
                        <input class="form-control-plaintext" type="text" id="cep" name="cep" value="<?=isset($cliente['cep']) ? $cliente['cep'] : ''?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="font-weight-bolder" for="email">Email</label>
                        <input class="form-control-plaintext" type="text" id="email" name="email" value="<?=isset($cliente['email']) ? $cliente['email'] : ''?>" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                    <label class="font-weight-bolder" for="telefone">Telefone</label>
                        <input class="form-control-plaintext" type="text" id="telefone" name="telefone" value="<?=isset($cliente['telefone']) ? $cliente['telefone'] : ''?>" readonly>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group border rounded p-5">
                <legend class="mb-4 font-weight-normal">Veículos dos cliente:</legend>
                <?php
                    $idx = 1;
                    foreach($veiculos as $v){
                        if($v->id_cliente == $cliente['id']){
                            $info = 1;
                ?>
                            <h5 class="font-weight-normal mb-5">Veículo <?=$idx++?> </h5>
                            <div class="form-row mb-4 border-bottom">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="font-weight-bolder" for="fabricante">Fabricante</label>
                                    <input class="form-control-plaintext" type="text" id="fabricante" name="fabricante" value="<?=isset($v->fabricante) ? $v->fabricante : ''?>" readonly>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="font-weight-bolder" for="modelo">Modelo</label>
                                    <input class="form-control-plaintext" type="text" id="modelo" name="modelo" value="<?=isset($v->modelo) ? $v->modelo : ''?>" readonly>
                                </div>
                            </div>
                            <div class="form-row mb-4 border-bottom">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="font-weight-bolder" for="ano">Ano</label>
                                    <input class="form-control-plaintext" type="text" id="ano" name="ano" value="<?=isset($v->ano) ? $v->ano : ''?>" readonly>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="font-weight-bolder" for="placa">Placa</label>
                                    <input class="form-control-plaintext" type="text" id="placa" name="placa" value="<?=isset($v->placa) ? $v->placa : ''?>" readonly>
                                </div>
                            </div>
                <?php
                        }
                    }
                    if(!isset($info)){
                ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="font-weight-normal mb-4 text-primary">Cliente sem veículos cadastrados</h5>
                        <a href="<?=URL_BASE.'cliente/adicionar/'.$cliente['id']?>" class="btn btn-primary" name="cliente_carro" type="submit">Adicionar carro</a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </fieldset>
            <div class="form-row">
                <div class="col-sm-12">
                    <a href="<?=URL_BASE.'cliente'?>" class="btn btn-success">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>