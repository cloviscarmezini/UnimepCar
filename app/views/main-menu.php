<?php 
    $url = explode('/',$_SERVER['PHP_SELF']);
    $url = isset($url[3]) ? $url[3] : $url[2];
    //echo $url;exit; 
?>
<nav class="nav-bar navbar-light bg-light border-right nav-lateral">
    <ul class="navbar-nav">
        <li class="nav-item <?=$url == 'index.php' ? 'menu_active' : ''?>">
            <a href="<?= URL_BASE?>" class="nav-item-custom"><i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a>
        </li>
        <li class="nav-item <?php echo ($_SESSION['tipo'] == 1) ? '' : 'd-none';echo $url == 'admin' ? 'menu_active' : '';?>">
            <a href="<?= URL_BASE.'admin'?>" class="nav-item-custom"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Administrativo</a>
        </li>
        </li>
        <li class="nav-item <?=$url == 'manutencao' ? 'menu_active' : ''?>">
            <a href="<?= URL_BASE.'manutencao'?>" class="nav-item-custom"><i class="fas fa-tools"></i>&nbsp;&nbsp;Manutenção</a>
        </li>
        <li class="nav-item <?=$url == 'cliente' ? 'menu_active' : ''?>">
            <a href="<?= URL_BASE.'cliente'?>" class="nav-item-custom"><i class="fas fa-users"></i>&nbsp;&nbsp;Clientes</a>
        </li>
        <li class="nav-item <?=$url == 'veiculo' ? 'menu_active' : ''?>">
            <a href="<?= URL_BASE.'veiculo'?>" class="nav-item-custom"><i class="fas fa-car"></i>&nbsp;&nbsp;Veículos</a>
        </li>
        <li class="nav-item <?=$url == 'peca' ? 'menu_active' : ''?>">
            <a href="<?= URL_BASE.'peca'?>" class="nav-item-custom"><i class="fas fa-luggage-cart"></i>&nbsp;&nbsp;Peças</a>
        </li>
    </ul>
</nav>