<?php
    namespace app\models;
    use app\core\Model;

    class Veiculo extends Model{

        protected $tabela = 'veiculo';
        protected $primaryKey = 'id';
        protected $parametros = ['codigo_modelo', 'codigo_marca', 'fabricante','modelo','ano','placa','id_cliente'];
        
        public function update_id($id){
            $sql = 'UPDATE '.$this->tabela.' SET id_cliente = 0 where id_cliente = :id';
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':id',$id);
            $qry->execute();
        }

        public function lista_fabricantes(){
            $sql = 'SELECT codigo_marca, marca FROM  fp_marca';
            $qry = $this->db->query($sql);
            return json_encode($qry->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function lista_modelos($id_fabricante){
            $sql = 'SELECT codigo_modelo,codigo_fipe, modelo FROM fp_modelo WHERE codigo_marca = '.$id_fabricante;
            $qry = $this->db->query($sql);
            return json_encode($qry->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function lista_fabricante($fabricante){
            if($fabricante){
                $sql = 'SELECT marca FROM fp_marca WHERE codigo_marca = '.$fabricante;
                $qry = $this->db->query($sql);
                $retorno = $qry->fetchAll(\PDO::FETCH_ASSOC);
                return $retorno[0]['marca'];
            }
            return false;
        }
        public function lista_modelo($modelo){
            if($modelo){
                $sql = 'SELECT modelo FROM fp_modelo WHERE codigo_modelo = '.$modelo;
                $qry = $this->db->query($sql);
                $retorno = $qry->fetchAll(\PDO::FETCH_ASSOC);
                return $retorno[0]['modelo'];
            }
            return false;
        }
        public function lista_anos($codigo_fipe){
            $sql = 'SELECT codigo_fipe, ano FROM fp_ano WHERE codigo_fipe = '.$codigo_fipe;
            $qry = $this->db->query($sql);
            return json_encode($qry->fetchAll(\PDO::FETCH_ASSOC));
        }
    }