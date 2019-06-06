<?php
    session_start();
    if(!$_SESSION){
        header('location:'.URL_BASE.'login');
    }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>SkyPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= URL_BASE.'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?= URL_BASE.'assets/css/style.css'?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    <header>
        <?php include_once 'header.php';?>
    </header>
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 px-0">
            <?php include_once 'main-menu.php';?>
          </div>
          <div class="col-md-10">
            <?php $this->load($view,$viewData);?>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <?php include_once 'footer.php'?>
    </footer>
  </body>
</html>