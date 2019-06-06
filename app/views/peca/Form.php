<div class="row">
    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE?>">Início</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?= URL_BASE.'peca'?>">Peças</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?> peça</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-2">
            <h1 class="h2 font-weight-light"><?=$title?> peça</h1>
        </div>
    </div>
    <?php
        if(isset($erros)){
        ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Por favor, preencha os campos corretamente!</h4>
                    <p>Os campos abaixo não foram preenchidos corretamente:</p>
                    <hr>
        <?php
                foreach ($erros as $erro){
                    echo '<p class="mb-0"> - '.$erro.'.</p>';
                }
            echo '</div></div></div>';
        }       ?>
    <div class="row justify-content-center <?=isset($erros) ? 'mt-2' : 'mt-5'?>">
        <div class="col-12">
            <form action="<?= URL_BASE.'peca/salvar' ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="descricao">Descrição</label>
                        <input class="form-control" type="text" id="descricao" name="descricao" value="<?=isset($peca['descricao']) ? $peca['descricao'] : ''?>" placeholder="Digite a descrição da peça">
                    </div>
                    <div class="form-group col">
                        <label for="marca">Marca</label>
                        <input class="form-control" type="text" id="marca" name="marca" value="<?=isset($peca['marca']) ? $peca['marca'] : ''?>" placeholder="Digite a marca da peça">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="preco">Preço</label>
                        <input class="form-control dinheiro" type="text" id="preco" name="preco" value="<?=isset($peca['preco']) ? $peca['preco'] : ''?>" placeholder="Digite o preço da peça">
                    </div>
                    <div class="form-group col">
                        <label for="estoque">Estoque</label>
                        <input class="form-control" type="number" id="estoque" name="estoque" value="<?=isset($peca['estoque']) ? $peca['estoque'] : ''?>" placeholder="Digite o estoque da peça">
                        <input type="hidden" name="id" value="<?= isset($peca['id']) ? $peca['id'] : '';?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit"><?=$btn?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>