<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="navbar-brand h1 mb-0" href="<?= URL_BASE?>">UnimepCar</a>  
    <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop">Bem vindo(a), <?=$_SESSION['nome']?></a>
                <div class="dropdown-menu">
                    <a href="<?= URL_BASE.'login/form_close' ?>" class="dropdown-item">Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>