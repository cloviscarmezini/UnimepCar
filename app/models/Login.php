<?php
    namespace app\models;
    use app\core\Model;

    class Login extends Model{
        protected $tabela = 'login';
        protected $primaryKey = 'id';
        protected $parametros = ['usuario', 'senha', 'tipo'];

        public function login($usuario,$senha){
            try {
                $sql = 'SELECT * FROM login WHERE usuario = :usuario AND senha = :senha limit 1';
                $qry = $this->db->prepare($sql);
                $qry->execute([
                    'usuario'    => $usuario,
                    'senha'      => $senha
                ]);
                $login = $qry->fetch();
                if($login){
                    return $login;
                }
                return false;
            }
            catch(PDOException $e) {
                echo 'erro';exit;
                echo 'Error: ' . $e->getMessage();exit;
            }
        }
    }
?>