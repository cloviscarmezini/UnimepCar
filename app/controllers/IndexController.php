<?php
    namespace app\controllers;
    use app\core\Controller;

    class IndexController extends Controller{
        public function index(){
            $data['view'] = 'v_home';
            $this->load('template',$data);
        }
    }