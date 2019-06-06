<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Cliente;
    use app\models\Veiculo;

    class ClienteController extends Controller{

        public function index(){
            $cliente = new Cliente();
            $data['clientes'] = $cliente->lista();
            $data['view'] = 'cliente/index';
            $this->load('template',$data);
        }
        public function new(){
            $data['view'] = 'cliente/form';
            $data['title'] = 'Novo';
            $data['btn'] = 'Salvar';
            $this->load('template',$data);
        }
        public function edita($id){
            $cliente = new Cliente();
            $data['cliente'] = $cliente->lista_selecionado($id);
            $data['view'] = 'cliente/form';
            $data['title'] = 'Editar';
            $data['btn'] = 'Editar';
            $this->load('template',$data);
        }
        public function detail($id){
            $cliente = new Cliente();
            $veiculo = new Veiculo();
            $data['veiculos'] = $veiculo->lista();
            $data['cliente'] = $cliente->lista_selecionado($id);
            $data['view'] = 'cliente/detail';
            $this->load('template',$data);
        }
        public function delete($id){
            $veiculo = new Veiculo();
            $veiculos = $veiculo->lista();
            foreach($veiculos as $v){
                if($v->id_cliente = $id){
                    $veiculo->update_id($id);
                }
            }
            $cliente = new Cliente();
            $cliente->delete($id);
            header('location:'.URL_BASE.'cliente');
        }

        public function salvar(){
            $erros = [];
            $cliente = new Cliente();
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
                    $data['cliente'] = $cliente->lista_selecionado($id);
                    $data['view'] = 'cliente/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Editar';
                    $data['btn'] = 'Editar';
                    $this->load('template',$data);
                }
                else{
                    $cliente->update($id,$nome,$cpf,$endereco,$cidade,$estado,$cep,$email,$telefone);
                    header('location:'.URL_BASE.'cliente');
                }
            }
            else{
                if($erros){
                    $data['view'] = 'cliente/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Novo';
                    $data['btn'] = 'Salvar';
                    $this->load('template',$data);
                }
                else{
                    if(isset($_POST['carro'])){
                        $data['id'] = $cliente->inserir($nome,$cpf,$endereco,$cidade,$estado,$cep,$email,$telefone);
                        $data['view_cliente'] = true;
                        $data['title'] = 'Inserir';
                        $data['btn'] = 'Inserir';
                        $data['view'] = 'veiculo/form';
                        $this->load('template',$data);
                    }
                    else{
                        $cliente->inserir($nome,$cpf,$endereco,$cidade,$estado,$cep,$email,$telefone);
                        header('location:'.URL_BASE.'cliente');
                    }
                }
            }
        }
        public function adicionar($id_cliente){
            $data['id'] = $id_cliente;
            $data['view_cliente'] = true;
            $data['title'] = 'Inserir';
            $data['btn'] = 'Inserir';
            $data['view'] = 'veiculo/form';
            $this->load('template',$data);
        }
        public function pesquisa_cliente(){
            $campo = $_POST['campo'];
            $res   = $_POST['res'];
            $retorno = 'json';
            $cliente = new Cliente();
            $cliente->lista_where($campo,$res,$retorno);
        }
        public function pesquisa(){
            $cliente = new Cliente();
            $campo = $_POST['campo'];
            $res = $_POST['res'];
            $retorno = 'array';
            $data['clientes'] = $cliente->lista_where($campo,$res,$retorno);
            $data['view'] = 'cliente/index';
            $this->load('template',$data);
        }
    }