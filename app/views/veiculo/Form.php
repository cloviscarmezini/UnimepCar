<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'veiculo'?>">Carros</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?> veículo</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light"><?=$title?> veículo</h1>
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
                    echo '<p class="mb-0"> - Insira um '.$erro.' válido.</p>';
                }
            echo '</div></div></div>';
        }       ?>
    <div class="row justify-content-center mb-5 <?=isset($erros) ? 'mt-2' : 'mt-5'?>">
        <div class="col-12">
            <form action="<?= URL_BASE.'veiculo/salvar' ?>" method="POST">
                <fieldset class="form-group border rounded p-5">
                    <legend class="mb-4 font-weight-normal">Dados do veículo:</legend>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="fabricante">Fabricante</label>
                            <select class="form-control" id="fabricante" name="fabricante">
                                <option value="0">Selecione...</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="modelo">Modelo</label>
                            <select class="form-control" id="modelo" name="modelo" disabled>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="ano">Ano</label>
                            <select class="form-control" id="ano" name="ano" disabled>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="placa">Placa</label>
                            <input class="form-control" type="text" id="placa" name="placa" value="<?=isset($veiculo['placa']) ? $veiculo['placa'] : ''?>" placeholder="Placa do veículo">
                            <input type="hidden" name="id" value="<?= isset($veiculo['id']) ? $veiculo['id'] : '';?>">
                        </div>
                    </div>
                </fieldset>
                <?php 
                    if(isset($view_cliente)){
                ?>
                    <input type="hidden" name="id_cliente" value="<?= isset($id) ? $id: ''?>">
                <?php
                    }
                    else{
                ?>
                    <fieldset class="form-group border rounded p-5">
                        <legend class="mb-4 font-weight-normal">Selecione o proprietário deste veículo:</legend>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-5">
                                <label for="cliente">Pesquisar</label>
                                <div class="input-group-append">
                                    <input class="form-control" id="campo_busca" type="text" placeholder="Pesquisar cliente...">
                                        <a href="#" id="busca_cliente" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-7">
                                <label for="cliente">Proprietário</label>
                                <select class="form-control" id="id_cliente" name="id_cliente">
                                    <option value="0">Selecione...</option>
                                    <?php
                                        foreach($clientes as $c){
                                            if($c->id == $veiculo['id_cliente']){
                                                echo '<option value="'.$c->id.'" selected> Nome: '.$c->nome.'  | CPF: '.$c->cpf.'</option>';
                                            }
                                            else{
                                                echo '<option value="'.$c->id.'"> Nome: '.$c->nome.'  | CPF: '.$c->cpf.'</option>';
                                            }   
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                <?php } ?>
                <div class="form-row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit"><?=$btn?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>