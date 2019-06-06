<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Login;

    class LoginController extends Controller{
        public function index(){
            session_start();
            if($_SESSION){
                header('location:'.URL_BASE);
            }
            $data['view'] = 'login/index';
            $this->load('template_login',$data);
        }
        public function autentica(){
            $erro = false;
            $usuario = (isset($_POST['usuario']) && ($_POST['usuario']) ) ? trim(strip_tags(filter_input(INPUT_POST, 'usuario'))) : $erro = true;
            $senha = (isset($_POST['senha']) && ($_POST['senha']) ) ? MD5(trim(strip_tags(filter_input(INPUT_POST, 'senha')))) : $erro = true;
            $login = new Login();
            $is_logged = $login->login($usuario,$senha);
            if($is_logged){
                session_start();
                $_SESSION['nome'] = $is_logged['usuario'];
                $_SESSION['tipo'] = $is_logged['tipo'];
                header('location:'.URL_BASE);
            }
            else{
                $data['erro'] =  $erro;
                $data['view'] = 'login/Index';
                $this->load('template_login',$data);
            }
        }
        public function form_close(){
            session_start();
            session_destroy();
            header('location:'.URL_BASE.'login');
        }
    }