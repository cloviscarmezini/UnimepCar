<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'manutencao'?>">Manutencao</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nova Manutencao</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light">Nova Manutencao</h1>
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
        }       
    ?>
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <form action="<?= URL_BASE.'manutencao/salvar' ?>" method="POST">
                <fieldset class="form-group border rounded p-5">
                    <legend class="mb-4 font-weight-normal">Dados do cliente:</legend>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-5">
                            <label>Pesquisar</label>
                            <div class="input-group-append">
                                <input class="form-control" id="campo_busca" type="text" placeholder="Pesquisar cliente...">
                                    <a href="#" id="busca_cliente" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-7">
                            <label for="id_cliente">Cliente</label>
                            <select class="form-control" id="id_cliente" name="id_cliente">
                                <option value="0">Selecione...</option>
                                <?php
                                        foreach($clientes as $c){
                                            echo '<option value="'.$c->id.'"> Nome: '.$c->nome.'  | CPF: '.$c->cpf.'</option>';  
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="id_veiculo">Veículo</label>
                            <select class="form-control" id="id_veiculo" name="id_veiculo">
                                <option value="0">Selecione...</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group border rounded p-5">
                    <legend class="mb-4 font-weight-normal">Dados da manutenção:</legend>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="data_inicio">Data de início</label>
                            <input class="form-control date" type="text" id="data_inicio" name="data_inicio" value="<?=date('d/m/Y')?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="data_termino">Data de término</label>
                            <input class="form-control date" type="text" id="data_termino" name="data_termino"  placeholder="Digite a data de termino" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="prazo">Prazo</label>
                            <input class="form-control" type="number" id="prazo" name="prazo"  placeholder="Prazo em dias">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="status">Situação</label>
                            <select class="form-control" name="status" disabled>
                                    <option value="Iniciado" selected>Iniciado</option>
                                    <option value="Aguardando retirada">Aguardando retirada</option>
                                    <option value="Atrasado">Atrasado</option>
                                    <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group border rounded p-5 itens">
                    <legend class="mb-4 font-weight-normal">Itens da manutenção:</legend>
                    <div class="form-row item">
                        <div class="form-group col-md-6">
                            <label for="desc_item">Descrição do item</label>
                            <input class="form-control desc_item" type="text" value="" placeholder="Descrição do item">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="valor_item">Valor</label>
                            <input class="form-control valor_item" type="text" value="" placeholder="Digite o valor deste item">
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label>Adicionar item</label>
                            <a class="text-success h3 d-block adiciona_item"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group border rounded p-5">
                    <legend class="mb-4 font-weight-normal">Peças da manutenção:</legend>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Pesquisar</label>
                            <div class="input-group-append">
                                <input class="form-control" id="campo_busca_peca" type="text" placeholder="Pesquisar peça...">
                                    <a href="#" id="busca_peca" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="id_peca">Peça</label>
                            <select class="form-control" id="id_peca">
                                <option value="0">Selecione...</option>
                                <?php
                                        foreach($pecas as $p){
                                            if($p->estoque>0){
                                                echo '<option value="'.$p->id.'">'.$p->descricao.' | Marca: '.$p->marca.'</option>';
                                            } 
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label>Estoque atual</label>
                            <input class="form-control" type="text" id="estoque_atual" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="qtd_peca">Quantidade</label>
                            <input class="form-control" type="num" id="qtd_peca" placeholder="Quantidade de peças">
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label>Adicionar peça</label>
                            <a class="text-success h3 d-block adiciona_peça"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div id="lista_pecas" class="mt-4">

                    </div>
                </fieldset>
                <div class="form-row mb-5">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>