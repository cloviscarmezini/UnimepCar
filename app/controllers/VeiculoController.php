<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\models\Veiculo;
    use app\models\Cliente;

    class VeiculoController extends Controller{
        public function index(){
            $veiculo = new Veiculo();
            $cliente = new Cliente();
            $data['veiculos'] = $veiculo->lista();
            $data['clientes'] = $cliente->lista();
            $data['view'] = 'veiculo/index';
            $this->load('template',$data);
        }
        public function new(){
            $cliente = new Cliente();
            $data['clientes'] = $cliente->lista();
            $data['view'] = 'veiculo/form';
            $data['title'] = 'Novo';
            $data['btn'] = 'Salvar';
            $this->load('template',$data);
        }
        public function edita($id){
            $veiculo = new Veiculo();
            $cliente = new Cliente();
            $data['veiculo'] = $veiculo->lista_selecionado($id);
            $data['clientes'] = $cliente->lista();
            $data['view'] = 'veiculo/form';
            $data['title'] = 'Editar';
            $data['btn'] = 'Editar';
            $this->load('template',$data);
        }
        public function detail($id){
            $cliente = new Cliente();
            $data['cliente'] = $cliente->lista_selecionado($id);
            $data['view'] = 'cliente/detail';
            $this->load('template',$data);
        }
        public function delete($id){
            $veiculo = new Veiculo();
            $veiculo->delete($id);
            header('location:'.URL_BASE.'veiculo');
        }

        public function salvar(){
            $erros = [];
            $veiculo = new veiculo();
            $id = ($_POST['id']) ? $_POST['id'] : $id = 0;
            $fabricante = isset($_POST['fabricante']) && ($_POST['fabricante']) ? trim(strip_tags(filter_input(INPUT_POST, 'fabricante'))) : $erros[] = 'fabricante';
            $modelo = isset($_POST['modelo']) && ($_POST['modelo']) ? trim(strip_tags(filter_input(INPUT_POST, 'modelo'))) : $erros[] = 'modelo';
            if(!$erros){
                $str_fabricante = $veiculo->lista_fabricante($fabricante);
                $str_modelo = $veiculo->lista_modelo($modelo);
            }
            $ano = isset($_POST['ano']) && ($_POST['ano']) ? trim(strip_tags(filter_input(INPUT_POST, 'ano'))) : $erros[] = 'ano';
            $placa = isset($_POST['placa']) && ($_POST['placa']) ? trim(strip_tags(filter_input(INPUT_POST, 'placa'))) : $erros[] = 'placa';
            $id_cliente = isset($_POST['id_cliente']) && ($_POST['id_cliente']) ? $_POST['id_cliente'] : $erros[] = 'cliente';
            if($id){
                if($erros){
                    $data['veiculo'] = $veiculo->lista_selecionado($id);
                    $data['view']  = 'veiculo/form';
                    $data['id']    = $id_cliente;
                    $data['erros'] = $erros;
                    $data['title'] = 'Inserir';
                    $data['btn']   = 'Inserir';
                    $this->load('template',$data);
                }
                else{
                    $veiculo->update($id,$modelo,$fabricante,$str_fabricante,$str_modelo,$ano,$placa,$id_cliente);
                    header('location:'.URL_BASE.'veiculo');
                }
            }
            else{
                if($erros){
                    $data['view']  = 'veiculo/form';
                    $data['erros'] = $erros;
                    $data['title'] = 'Inserir';
                    $data['btn']   = 'Inserir';
                    $this->load('template',$data);
                }
                else{
                    $veiculo->inserir($modelo,$fabricante,$str_fabricante,$str_modelo,$ano,$placa,$id_cliente);
                    header('location:'.URL_BASE.'veiculo');
                }
            }
        }

        public function lista_fabricantes(){
            $veiculo = new Veiculo();
            die($veiculo->lista_fabricantes());
        }
        public function lista_modelos($fabricante_id){
            $veiculo = new Veiculo();
            die($veiculo->lista_modelos($fabricante_id));
        }
        public function lista_anos($codigo_fipe){
            $veiculo = new Veiculo();
            die($veiculo->lista_anos($codigo_fipe));
        }

        public function pesquisa(){
            $cliente = new Cliente();
            $veiculo = new Veiculo();
            $campo = $_POST['campo'];
            $res = $_POST['res'];
            $retorno = 'array';
            $data['clientes'] = $cliente->lista();
            $data['veiculos'] = $veiculo->lista_where($campo,$res,$retorno);
            $data['view'] = 'veiculo/index';
            $this->load('template',$data);
        }
        public function pesquisa_veiculo_cliente(){
            $veiculo = new Veiculo();
            $res = $_POST['id_cliente'];
            $campo = 'id_cliente';
            $retorno = 'json';
            if($res){
                $veiculo->lista_where($campo,$res,$retorno);
            }
        }

    }