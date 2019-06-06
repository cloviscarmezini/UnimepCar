<?php
    if($_SESSION['tipo'] != 1)header('location:'.URL_BASE);
?>
<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'admin'?>">Administrativo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3  mt-2">
            <h1 class="h2 font-weight-light">Usuários</h1>
        </div>
        <div class="offset-md-7 col-md-2 mt-2">
            <a href="<?= URL_BASE.'usuario/new'?>" class="btn btn-primary btn-block">Novo</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12 mt-3">
            <div class="table-responsive mt-3">
                <?php
                    if(empty($usuarios)){
                        echo '
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Você não possui nenhum usuário cadastrado!</h4>
                                <p>Clique em novo para adicionar.</p>
                                <hr>
                                <p class="mb-0">Seus usuários aparecerão logo abaixo.</p>
                            </div>
                        ';
                    }
                    else{
                ?>
                <table class="table table-borderless">
                    <thead>
                        <tr class="bg-light">
                            <th class="font-weight-normal">Usuário</th>
                            <th class="font-weight-normal">Tipo</th>
                            <th class="font-weight-normal">Ações</th>
                        </tr>   
                    </thead>
                    <tbody>
                <?php
                        foreach($usuarios as $u){
                            echo'
                                <tr class="cor_tabela">
                                    <td>'.$u->usuario.'</td>
                                    <td>'.(($u->tipo == 1) ? '<span class="badge badge-danger">Administrador' : '<span class="badge badge-primary">Usuário').'</span></td>
                                    <td>
                                        <a href="'.URL_BASE.'usuario/edita/'.$u->id.'"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="modal_btn" data-toggle="modal" data-target="#usuarioModal" id="'.$u->id.'"><i class="fas fa-trash-alt text-primary"></i></a>
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
<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja apagar este usuário?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'usuario/delete/'?>" id="btn_excluir" class="btn btn-danger">Apagar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>