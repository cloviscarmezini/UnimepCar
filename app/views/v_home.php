<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Início</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light">Inicio</h1>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center mt-5">
        <div class="col-sm-10 col-md-4">
            <a class="card-a" href="<?= URL_BASE.'manutencao'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Manutenção
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie manutenções.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-tools"></i></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-10 col-md-4">
            <a class="card-a" href="<?= URL_BASE.'cliente'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Clientes
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie seus clientes.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-users"></i></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-10 col-md-4">
            <a class="card-a" href="<?= URL_BASE.'veiculo'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Veículos
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie veículos.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-car"></i></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-sm-10 col-md-4">
            <a class="card-a" href="<?= URL_BASE.'peca'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Peças
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie suas peças.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-luggage-cart"></i></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-10 col-md-4 <?=($_SESSION['tipo'] == 1) ? '' : 'd-none'?>">
            <a class="card-a" href="<?= URL_BASE.'admin'?>">
                <div class="card text-white bg-blue mb-3 car-hover">
                    <div class="card-header">
                        Administrativo
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gerencie seu sistema.</h5>
                        <p class="card-text text-center display-4"><i class="fas fa-user-cog"></i></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>