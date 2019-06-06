<?php
    if($_SESSION['tipo'] != 1)header('location:'.URL_BASE);
?>
<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Administrativo</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light">Administrativo</h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center mt-5">
        <div class="col-sm-10 col-md-4">
            <a class="card-a" href="<?= URL_BASE.'admin/funcionario'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Funcionários
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie funcionários.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-id-card"></i></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-10 col-md-4">
            <a class="card-a" href="<?= URL_BASE.'admin/usuario'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Usuários
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie seus usuários.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-user-alt"></i></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>