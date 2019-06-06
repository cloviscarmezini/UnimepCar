<?php
    namespace app\models;
    use app\core\Model;

    class Peca extends Model{

        protected $tabela = 'peca';
        protected $primaryKey = 'id';
        protected $parametros = ['descricao', 'marca', 'preco','estoque'];

        public function update_estoque($id,$qtd){
            $sql = 'UPDATE '.$this->tabela.' SET estoque = :qtd where id = :id';
            $qry = $this->db->prepare($sql);
            $qry->bindValue(':qtd',$qtd);
            $qry->bindValue(':id',$id);
            $qry->execute();
        }
    }
?>