<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3  mt-2">
            <h1 class="h2 font-weight-light">Clientes</h1>
        </div>
        <div class="col-md-7 mt-2">
            <form action="<?=URL_BASE.'cliente/pesquisa'?>" method="post">
                <div class="form-row">
                    <div class="form-group col">
                        <select name="campo" id="parametro_pesquisa" class="form-control">
                            <option value="0">selecione...</option>
                            <option value="nome">Nome</option>
                            <option value="cpf">CPF</option>
                            <option value="email">email</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <div class="input-group-append">
                            <input class="form-control" id="campo_pesquisa" name="res" type="text" placeholder="Pesquisar cliente...">
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2 mt-2">
            <a href="<?= URL_BASE.'cliente/new'?>" class="btn btn-primary btn-block">Novo</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12 mt-3">
            <div class="table-responsive mt-3">
                <?php
                    if(empty($clientes)){
                        echo '
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Nenhum cliente encontrado!</h4>
                                <p>Sua pesquisa não retornou nada.</p>
                                <hr>
                                <p class="mb-0">Caso não possua um cliente, clique em novo para adicionar.</p>
                            </div>
                        ';
                    }
                    else{
                ?>
                <table class="table table-borderless">
                    <thead>
                        <tr class="bg-light">
                            <th class="font-weight-normal">Nome</th>
                            <th class="font-weight-normal">CPF</th>
                            <th class="font-weight-normal">Telefone</th>
                            <th class="font-weight-normal">E-mail</th>
                            <th class="font-weight-normal">Ações</th>
                        </tr>   
                    </thead>
                    <tbody>
                <?php
                        foreach($clientes as $c){
                            echo'
                                <tr class="cor_tabela">
                                    <td>'.$c->nome.'</td>
                                    <td>'.$c->cpf.'</td>
                                    <td>'.$c->telefone.'</td>
                                    <td>'.$c->email.'</td>
                                    <td>
                                        <a href="'.URL_BASE.'cliente/detail/'.$c->id.'"><i class="far fa-eye text-primary"></i></a>
                                        <a href="'.URL_BASE.'cliente/edita/'.$c->id.'"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="modal_btn" data-toggle="modal" data-target="#clienteModal" id="'.$c->id.'"><i class="fas fa-trash-alt text-primary"></i></a>
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
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja apagar este cliente?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'cliente/delete/'?>" id="btn_excluir" class="btn btn-danger">Apagar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>