<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Login;
    use app\models\Funcionario;

    class AdminController extends Controller{
        public function index(){
            $data['view'] = 'admin/index';
            $this->load('template',$data);
        }
        public function funcionario(){
            $funcionario = new Funcionario();
            $data['funcionarios'] = $funcionario->lista();
            $data['view'] = 'funcionario/index';
            $this->load('template',$data);
        }
        public function usuario(){
            $login = new Login();
            $data['usuarios'] = $login->lista();
            $data['view'] = 'usuario/index';
            $this->load('template',$data);
        }
    }