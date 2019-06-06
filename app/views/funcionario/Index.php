<?php
    if($_SESSION['tipo'] != 1)header('location:'.URL_BASE);
?>
<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'admin'?>">Administrativo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funcionários</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3  mt-2">
            <h1 class="h2 font-weight-light">Funcionários</h1>
        </div>
        <div class="offset-md-7 col-md-2 mt-2">
            <a href="<?= URL_BASE.'funcionario/new'?>" class="btn btn-primary btn-block">Novo</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-12 mt-3">
            <div class="table-responsive mt-3">
                <?php
                    if(empty($funcionarios)){
                        echo '
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Você não possui nenhum funcionário cadastrado!</h4>
                                <p>Clique em novo para adicionar.</p>
                                <hr>
                                <p class="mb-0">Seus funcionários aparecerão logo abaixo.</p>
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
                        foreach($funcionarios as $f){
                            echo'
                                <tr class="cor_tabela">
                                    <td>'.$f->nome.'</td>
                                    <td>'.$f->cpf.'</td>
                                    <td>'.$f->telefone.'</td>
                                    <td>'.$f->email.'</td>
                                    <td>
                                        <a href="'.URL_BASE.'funcionario/edita/'.$f->id.'"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="#" class="modal_btn" data-toggle="modal" data-target="#funcionarioModal" id="'.$f->id.'"><i class="fas fa-trash-alt text-primary"></i></a>
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
<div class="modal fade" id="funcionarioModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja apagar este funcionário?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <a href="<?=URL_BASE.'funcionario/delete/'?>" id="btn_excluir" class="btn btn-danger">Apagar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>