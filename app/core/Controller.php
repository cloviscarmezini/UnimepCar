<?php
    namespace app\core;

    class Controller{
        public function load($viewName, $viewData = []){
            extract($viewData);
            include 'app/views/'.$viewName.'.php';
        }
    }