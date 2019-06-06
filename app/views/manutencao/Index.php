<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manutenção</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3  mt-2">
            <h1 class="h2 font-weight-light">Manutenções</h1>
        </div>
        <div class="col-md-2 mt-2">
            <div class="input-group-append">
                <select name="" class="form-control">
                    <option value="">selecione...</option>
                    <option value="">Cliente</option>
                    <option value="">Placa</option>
                    <option value="">Modelo</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 mt-2">
            <div class="input-group-append">
                <input class="form-control" id="busca" type="text" placeholder="Pesquisar...">
                <a href="" class="btn btn-dark">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
        <div class="col-md-2 mt-2">
            <a href="<?= URL_BASE.'manutencao/new'?>" class="btn btn-primary btn-block">Novo</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12 mt-3">
            <div class="table-responsive mt-3">
                <?php
                    if(empty($manutencoes)){
                        echo '
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Você não possui nenhuma manutenção!</h4>
                                <p>Clique em nova para adicionar.</p>
                                <hr>
                                <p class="mb-0">Suas manutenções aparecerão logo abaixo.</p>
                            </div>
                        ';
                    }
                    else{
                ?>
                <table class="table table-borderless">
                    <thead>
                        <tr class="bg-light">
                            <th class="font-weight-normal">Cliente</th>
                            <th class="font-weight-normal">Veículo</th>
                            <th class="font-weight-normal">Data inicio</th>
                            <th class="font-weight-normal">Prazo</th>
                            <th class="font-weight-normal">Ações</th>
                        </tr>   
                    </thead>
                    <tbody>
                <?php
                        foreach($manutencoes as $m){
                            echo'
                                <tr class="cor_tabela">
                                    <td>';
                                        foreach($clientes as $idx=>$c){
                                            if($c->id == $m->cliente_id){
                                                echo $c->nome;
                                            }
                                        }
                                    echo'</td>
                                    <td>';
                                        foreach($veiculos as $v){
                                            if($v->id == $m->veiculo_id){
                                                echo $v->fabricante.' - '.$v->modelo;
                                            }
                                        }
                                    echo '</td>
                                    <td>'.date("d/m/Y", strtotime($m->data_inicio)).'</td>
                                    <td>'.$m->prazo.'</td>
                                    <td>
                                        <a href="'.URL_BASE.'manutencao/edita/'.$m->id.'"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="modal_btn" data-toggle="modal" data-target="#manutencaoModal" id="'.$m->id.'"><i class="fas fa-trash-alt text-primary"></i></a>
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
<div class="modal fade" id="manutencaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja apagar esta manutenção?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'manutencao/delete/'?>" id="btn_excluir" class="btn btn-danger">Apagar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>