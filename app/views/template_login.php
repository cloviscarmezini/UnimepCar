<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>clovis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= URL_BASE.'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?= URL_BASE.'assets/css/style.css'?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body class="bg-gray-1">
    <div class="container">
      <div class="row justify-content-center mb-3">
          <div class="col-md-4 text-center">
              <img src="<?=URL_BASE.'assets/img/logo.png'?>" class="img-fluid px-5 pt-5"> 
              <h1 class="h4 font-weight-light">Sistema de manutenção de veículos</h1>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-5 bg-light border p-5 rounded">
            <?php $this->load($view,$viewData);?>
          </div>
    </div>
</div>
  </body>
</html>