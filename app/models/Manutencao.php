<?php
    namespace app\models;
    use app\core\Model;

    class Manutencao extends Model{

        protected $tabela = 'manutencao';
        protected $primaryKey = 'id';
        protected $parametros = ['cliente_id', 'veiculo_id', 'data_inicio','data_termino','prazo','valor_total','status'];
    }
?>