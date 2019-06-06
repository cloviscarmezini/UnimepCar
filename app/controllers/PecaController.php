<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Peca;

    class PecaController extends Controller{

        public function index(){
            $peca = new Peca();
            $data['pecas'] = $peca->lista();
            $data['view'] = 'peca/Index';
            $this->load('template',$data);
        }
        public function new(){
            $data['view'] = 'peca/form';
            $data['title'] = 'Nova';
            $data['btn'] = 'Salvar';
            $this->load('template',$data);
        }
        public function edita($id){
            $peca = new Peca();
            $data['peca'] = $peca->lista_selecionado($id);
            $data['view'] = 'peca/form';
            $data['title'] = 'Editar';
            $data['btn'] = 'Editar';
            $this->load('template',$data);
        }
        public function delete($id){
            $peca = new Peca();
            $peca->delete($id);
            header('location:'.URL_BASE.'peca');
        }

        public function salvar(){
            $erros = [];
            $peca = new Peca();
            $id = ($_POST['id']) ? $_POST['id'] : $id = 0;
            $descricao = ($_POST['descricao']) ? trim(strip_tags(filter_input(INPUT_POST, 'descricao'))) : $erros[] = 'descricao';
            $marca = ($_POST['marca']) ? trim(strip_tags(filter_input(INPUT_POST, 'marca'))) : $erros[] = 'marca';
            $preco = ($_POST['preco']) ? trim(strip_tags(filter_input(INPUT_POST, 'preco'))) : $erros[] = 'preco';
            $estoque = ($_POST['estoque']) ? trim(strip_tags(filter_input(INPUT_POST, 'estoque'))) : $erros[] = 'estoque';
            if($id){
                if($erros){
                    $data['peca'] = $peca->lista_selecionado($id);
                    $data['view'] = 'peca/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Editar';
                    $data['btn'] = 'Editar';
                    $this->load('template',$data);
                }
                else{
                    $peca->update($id,$descricao,$marca,$preco,$estoque);
                    header('location:'.URL_BASE.'peca');
                }
            }
            else{
                if($erros){
                    $data['view'] = 'peca/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Novo';
                    $data['btn'] = 'Salvar';
                    $this->load('template',$data);
                }
                else{
                    $peca->inserir($descricao,$marca,$preco,$estoque);
                    header('location:'.URL_BASE.'peca');
                }
            }
        }
        public function pesquisa(){
            $peca = new Peca();
            $campo = $_POST['campo'];
            $res = $_POST['res'];
            $retorno = 'array';
            $data['pecas'] = $peca->lista_where($campo,$res,$retorno);
            $data['view'] = 'peca/index';
            $this->load('template',$data);
        }
        public function pesquisa_peca(){
            $campo = $_POST['campo'];
            $res   = $_POST['res'];
            $retorno = 'json';
            $peca = new Peca();
            $peca->lista_where($campo,$res,$retorno);
        }
    }