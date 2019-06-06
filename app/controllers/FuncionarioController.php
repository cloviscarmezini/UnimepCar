<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Funcionario;

    class FuncionarioController extends Controller{

        public function index(){
            $funcionario = new Funcionario();
            $data['funcionarios'] = $funcionario->lista();
            $data['view'] = 'funcionario/index';
            $this->load('template',$data);
        }
        public function new(){
            $data['view'] = 'funcionario/form';
            $data['title'] = 'Novo';
            $data['btn'] = 'Salvar';
            $this->load('template',$data);
        }
        public function edita($id){
            $funcionario = new Funcionario();
            $data['funcionario'] = $funcionario->lista_selecionado($id);
            $data['view'] = 'funcionario/form';
            $data['title'] = 'Editar';
            $data['btn'] = 'Editar';
            $this->load('template',$data);
        }
        public function delete($id){
            $funcionario = new Funcionario();
            $funcionario->delete($id);
            header('location:'.URL_BASE.'funcionario');
        }

        public function salvar(){
            $erros = [];
            $funcionario = new Funcionario();
            $id = ($_POST['id']) ? $_POST['id'] : $id = 0;
            $nome = ($_POST['nome']) ? trim(strip_tags(filter_input(INPUT_POST, 'nome'))) : $erros[] = 'nome';
            $cpf = ($_POST['cpf']) ? trim(strip_tags(filter_input(INPUT_POST, 'cpf'))) : $erros[] = 'cpf';
            $endereco = ($_POST['endereco']) ? trim(strip_tags(filter_input(INPUT_POST, 'endereco'))) : $erros[] = 'endereco';
            $cidade = ($_POST['cidade']) ? trim(strip_tags(filter_input(INPUT_POST, 'cidade'))) : $erros[] = 'cidade';
            $estado = ($_POST['estado']) ? trim(strip_tags(filter_input(INPUT_POST, 'estado'))) : $erros[] = 'estado';
            $cep = ($_POST['cep']) ? trim(strip_tags(filter_input(INPUT_POST, 'cep'))) : $erros[] = 'cep';
            $email = ($_POST['email']) ? trim(strip_tags(filter_input(INPUT_POST, 'email'))) : $erros[] = 'email';
            $telefone = ($_POST['telefone']) ? trim(strip_tags(filter_input(INPUT_POST, 'telefone'))) : $erros[] = 'telefone';
            if($id){
                if($erros){
                    $data['funcionario'] = $funcionario->lista_selecionado($id);
                    $data['view'] = 'funcionario/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Editar';
                    $data['btn'] = 'Editar';
                    $this->load('template',$data);
                }
                else{
                    $funcionario->update($id,$nome,$cpf,$endereco,$cidade,$estado,$cep,$email,$telefone);
                    header('location:'.URL_BASE.'funcionario');
                }
            }
            else{
                if($erros){
                    $data['view'] = 'funcionario/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Novo';
                    $data['btn'] = 'Salvar';
                    $this->load('template',$data);
                }
                else{
                    $funcionario->inserir($nome,$cpf,$endereco,$cidade,$estado,$cep,$email,$telefone);
                    header('location:'.URL_BASE.'funcionario');
                }
            }
        }
    }