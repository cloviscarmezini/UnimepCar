<?php
    namespace app\core;

    abstract class Model{
        protected $db;
        protected $tabela;
        protected $primaryKey;
        protected $parametros = [];

        public function __construct(){
            $this->db = new \PDO('mysql:dbname='.BANCO.'; host='.SERVIDOR,USUARIO,SENHA);
            $this->db->exec("set names utf8");
        }

        //select

        public function lista(){
            $sql = 'select * from '.$this->tabela;
            $qry = $this->db->query($sql);
            return $qry->fetchAll(\PDO::FETCH_OBJ);
        }

        //select where id

        public function lista_selecionado($id){
            $sql = 'select * from '.$this->tabela.' where '.$this->primaryKey.' = '.$id;
            $qry = $this->db->query($sql);
            return $qry->fetch();
        }
        public function lista_where($campo,$res,$retorno){
            $sql = 'select * from '.$this->tabela.' where '.$campo.' like "%'.$res.'%"';
            $qry = $this->db->query($sql);
            if($retorno == 'json'){
                die(json_encode($qry->fetchAll(\PDO::FETCH_ASSOC)));
            }
            else{
                return $qry->fetchAll(\PDO::FETCH_OBJ);
            }
        }

        //delete

        public function delete($id){
            try {
                $sql = 'DELETE FROM '.$this->tabela.' WHERE '.$this->primaryKey.' = :'.$id;
                $qry = $this->db->prepare($sql);
                $qry->bindParam(':'.$id, $id); 
                $qry->execute();
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();exit;
            }
        }

        //inserir

        public function inserir(){
            $sql_end = '';
            $parametros = func_get_args();
            $n_parametros = func_num_args();
            if($n_parametros == count($this->parametros)){
                for($i = 0; $i<$n_parametros;$i++){
                    $sql_end .= $this->parametros[$i].' = :'.$this->parametros[$i];
                    if($i != ($n_parametros-1))$sql_end .= ', ';
                }
                $sql = 'INSERT INTO '.$this->tabela.' SET  '.$sql_end;
                $qry = $this->db->prepare($sql);
                foreach($parametros as $index=>$p){
                    $qry->bindValue(':'.$this->parametros[$index],$p);
                }
                $qry->execute();
                return $this->db->lastInsertId();
            }
            else{
                return 'erro';
            }
        }

        //update

        public function update(){
            $sql_end = '';
            $parametros = func_get_args();
            $id = $parametros[0];
            array_shift($parametros);
            $n_parametros = func_num_args() - 1;
            if($n_parametros == count($this->parametros)){
                for($i = 0; $i<$n_parametros;$i++){
                    $sql_end .= $this->parametros[$i].' = :'.$this->parametros[$i];
                    if($i != ($n_parametros-1))$sql_end .= ', ';
                }
                $sql = 'UPDATE '.$this->tabela.' SET '.$sql_end.' WHERE '.$this->primaryKey .'= :'.$this->primaryKey;
                $qry = $this->db->prepare($sql);
                $qry->bindValue(':'.$this->primaryKey,$id);
                foreach($parametros as $index=>$p){
                    $qry->bindValue(':'.$this->parametros[$index],$p);
                }
                $qry->execute();
            }
            else{
                return 'erro';
            }
        }
    }