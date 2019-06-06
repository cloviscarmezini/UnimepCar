<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Login;

    class UsuarioController extends Controller{
        public function index(){
            $login = new Login();
            $data['usuarios'] = $login->lista();
            $data['view'] = 'usuario/index';
            $this->load('template',$data);
        }
        public function new(){
            $data['view'] = 'usuario/form';
            $data['title'] = 'Novo';
            $data['btn'] = 'Salvar';
            $this->load('template',$data);
        }
        public function edita($id){
            $login = new Login();
            $data['usuario'] = $login->lista_selecionado($id);
            $data['view'] = 'usuario/form';
            $data['title'] = 'Editar';
            $data['btn'] = 'Editar';
            $this->load('template',$data);
        }
        public function delete($id){
            $login = new Login();
            $login->delete($id);
            header('location:'.URL_BASE.'usuario');
        }
        public function salvar(){
            $erros = [];
            $login = new Login();
            $id = ($_POST['id']) ? $_POST['id'] : 0;
            $usuario = ($_POST['usuario']) ? trim(strip_tags(filter_input(INPUT_POST, 'usuario'))) : $erros[] = 'usuario';
            $tipo = ($_POST['tipo']) ? trim(strip_tags(filter_input(INPUT_POST, 'tipo'))) : $erros[] = 'tipo';
            if($id){
                if($erros){
                    $data['usuario'] = $login->lista_selecionado($id);
                    $data['title'] = 'Editar';
                    $data['btn'] = 'Editar';
                    $data['view'] = 'usuario/form';
                    $data['erros'] = $erros;
                    $this->load('template',$data);
                }
                else{
                    $senha = $login->lista_selecionado($id);
                    $senha = $senha['senha'];
                    $login->update($id,$usuario,$senha,$tipo);
                    header('location:'.URL_BASE.'usuario');
                }
            }
            else{
                $senha = ($_POST['senha']) ? md5(trim(strip_tags(filter_input(INPUT_POST, 'senha')))) : $erros[] = 'senha';
                if($erros){
                    $data['view'] = 'usuario/form';
                    $data['erros'] = $erros;
                    $this->load('template',$data);
                }
                else{
                    $login->inserir($usuario,$senha,$tipo);
                    header('location:'.URL_BASE.'usuario');
                }
            }
        }
        public function altera_senha(){
            $senhaAtual = ($_POST['senhaAtual']) ? md5(trim(strip_tags(filter_input(INPUT_POST, 'senhaAtual')))) : $senhaAtual = 0;
            $senhaNova = ($_POST['senhaNova']) ? md5(trim(strip_tags(filter_input(INPUT_POST, 'senhaNova')))) : $senhaAtual = 0;
            $id = (isset($_POST['id_usuario']) && ($_POST['id_usuario']) ) ? trim(strip_tags(filter_input(INPUT_POST, 'id_usuario'))) : $senhaAtual = 0;
            if($senhaAtual){
                $login = new Login();
                $usuario_atual = $login->lista_selecionado($id);
                if($senhaAtual == $usuario_atual['senha']){
                    $login->update($id,$usuario_atual['usuario'],$senhaNova,$usuario_atual['tipo']);
                    $retorno = ['sucesso' => 'Senha alterada com sucesso'];
                    die(json_encode($retorno));
                }
                else{
                    $retorno = ['erro' => 'Dados não correspondem'];
                    die(json_encode($retorno));
                }
            }
        }
        public function reseta_senha($id){
            $senha = md5('12345');
            $login = new Login();
            $usuario_atual = $login->lista_selecionado($id);
            $login->update($id,$usuario_atual['usuario'],$senha,$usuario_atual['tipo']);
            header('location:'.URL_BASE.'usuario/edita/'.$id);
        }
    }