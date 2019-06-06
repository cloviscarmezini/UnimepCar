<?php
    namespace app\models;
    use app\core\Model;

    class Funcionario extends Model{

        protected $tabela = 'funcionario';
        protected $primaryKey = 'id';
        protected $parametros = ['nome', 'cpf', 'endereco','cidade','estado','cep','email','telefone'];
    }
?>