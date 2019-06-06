<?php
    namespace app\models;
    use app\core\Model;

    class Cliente extends Model{

        protected $tabela = 'cliente';
        protected $primaryKey = 'id';
        protected $parametros = ['nome', 'cpf', 'endereco','cidade','estado','cep','email','telefone'];
    }
?>