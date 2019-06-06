<?php
    namespace app\models;
    use app\core\Model;

    class ItensManutencao extends Model{

        protected $tabela = 'itens_manutencao';
        protected $primaryKey = 'id';
        protected $parametros = ['id_manutencao', 'descricao', 'valor'];

        public function delete($id){
            try {
                $sql = 'DELETE FROM '.$this->tabela.' WHERE id_manutencao = '.$id;
                $qry = $this->db->prepare($sql);
                $qry->execute();
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();exit;
            }
        }
    }
?>