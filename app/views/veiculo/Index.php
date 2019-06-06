<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Veículos</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3  mt-2">
            <h1 class="h2 font-weight-light">Veículos</h1>
        </div>
        <div class="col-md-7 mt-2">
            <form action="<?=URL_BASE.'veiculo/pesquisa'?>" method="post">
                <div class="form-row">
                    <div class="form-group col">
                        <select name="campo" class="form-control">
                            <option value="0">selecione...</option>
                            <option value="fabricante">Fabricante</option>
                            <option value="modelo">Modelo</option>
                            <option value="placa">Placa</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <div class="input-group-append">
                            <input class="form-control" name="res" type="text" placeholder="Pesquisar veículo...">
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2 mt-2">
            <a href="<?= URL_BASE.'veiculo/new'?>" class="btn btn-primary btn-block">Novo</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12 mt-3">
            <div class="table-responsive mt-3">
                <?php
                    if(empty($veiculos)){
                        echo '
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Nenhum veículo encontrado!</h4>
                                <p>Sua pesquisa não retornou nada.</p>
                                <hr>
                                <p class="mb-0">Caso não possua um veículo, clique em novo para adicionar.</p>
                            </div>
                        ';
                    }
                    else{
                ?>
                <table class="table table-borderless">
                    <thead>
                        <tr class="bg-light">
                            <th class="font-weight-normal">Fabricante</th>
                            <th class="font-weight-normal">Modelo</th>
                            <th class="font-weight-normal">Ano</th>
                            <th class="font-weight-normal">Placa</th>
                            <th class="font-weight-normal">Proprietário</th>
                            <th class="font-weight-normal">Ações</th>
                        </tr>   
                    </thead>
                    <tbody>
                <?php   
                        foreach($veiculos as $v){
                            echo'
                                <tr class="cor_tabela">
                                    <td>'.$v->fabricante.'</td>
                                    <td>'.$v->modelo.'</td>
                                    <td>'.$v->ano.'</td>
                                    <td>'.$v->placa.'</td>
                                    <td>';
                                    if(!$v->id_cliente){
                                        echo '<a href="" class="badge badge-danger p-1 h1">Sem proprietário';
                                    }
                                    foreach($clientes as $c){
                                        if($c->id == $v->id_cliente){
                                            echo '<a href="'.URL_BASE.'cliente/detail/'.$c->id.'" class="badge badge-primary p-1">'.$c->nome;
                                        }
                                    }
                                echo'
                                    </a></td>
                                    <td>
                                        <a href="'.URL_BASE.'veiculo/edita/'.$v->id.'"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="modal_btn" data-toggle="modal" data-target="#veiculoModal" id="'.$v->id.'"><i class="fas fa-trash-alt text-primary"></i></a>
                                    </td>
                                </tr>
                            ';
                        }
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="veiculoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja apagar este veículo?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'veiculo/delete/'?>" id="btn_excluir" class="btn btn-danger">Apagar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>