<?php
    namespace app\models;
    use app\core\Model;

    class PecaManutencao extends Model{

        protected $tabela = 'peca_manutencao';
        protected $primaryKey = 'id';
        protected $parametros = ['id_peca', 'id_manutencao','quantidade'];

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