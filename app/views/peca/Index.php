<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Peças</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3  mt-2">
            <h1 class="h2 font-weight-light">Peças</h1>
        </div>
        <div class="col-md-7 mt-2">
            <form action="<?=URL_BASE.'peca/pesquisa'?>" method="post">
                <div class="form-row">
                    <div class="form-group col">
                        <select name="campo" class="form-control">
                            <option value="0">selecione...</option>
                            <option value="descricao">Descrição</option>
                            <option value="marca">Marca</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <div class="input-group-append">
                            <input class="form-control" name="res" type="text" placeholder="Pesquisar...">
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2 mt-2">
            <a href="<?= URL_BASE.'peca/new'?>" class="btn btn-primary btn-block">Nova</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center mb-5">
        <div class="col-sm-10 col-md-12 mt-3">
            <div class="table-responsive mt-3">
                <?php
                    if(empty($pecas)){
                        echo '
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Nenhuma peça encontrada!</h4>
                                <p>Sua pesquisa não retornou nada.</p>
                                <hr>
                                <p class="mb-0">Caso não possua uma peça, clique em novo para adicionar.</p>
                            </div>
                        ';
                    }
                    else{
                ?>
                <table class="table table-borderless">
                    <thead>
                        <tr class="bg-light">
                            <th class="font-weight-normal">Descrição</th>
                            <th class="font-weight-normal">Marca</th>
                            <th class="font-weight-normal">Preço</th>
                            <th class="font-weight-normal">Estoque</th>
                            <th class="font-weight-normal">Ações</th>
                        </tr>   
                    </thead>
                    <tbody>
                <?php
                        foreach($pecas as $p){
                            echo'
                                <tr class="cor_tabela">
                                    <td>'.$p->descricao.'</td>
                                    <td>'.$p->marca.'</td>
                                    <td>R$ '.$p->preco.'</td>
                                    <td>'.$p->estoque.'</td>
                                    <td>
                                        <a href="'.URL_BASE.'peca/edita/'.$p->id.'"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="modal_btn" data-toggle="modal" data-target="#pecaModal" id="'.$p->id.'"><i class="fas fa-trash-alt text-primary"></i></a>
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
<div class="modal fade" id="pecaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja apagar esta peça?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'peca/delete/'?>" id="btn_excluir" class="btn btn-danger">Apagar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>