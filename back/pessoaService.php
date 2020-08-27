<?php

    class PessoaService{
        private $conexao;
        private $pessoa;

        public function __construct(Conexao $conexao, Pessoa $pessoa){
			$this->conexao = $conexao->conectar();
			$this->pessoa = $pessoa;
        }

        public function inserir(){
            $query = "insert into pessoa (nome, cargo, setor, email, senha)values(:nome,:setor,:cargo,:email,:senha)";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->pessoa->__get('nome'));

            $stmt->bindValue(':cargo', $this->pessoa->__get('cargo'));

            $stmt->bindValue(':setor', $this->pessoa->__get('setor'));

            $stmt->bindValue(':email', $this->pessoa->__get('email'));

            $stmt->bindValue(':senha', $this->pessoa->__get('senha'));

            $stmt->execute();
             
        }

        public function recuperar(){
            $query = "select id, nome, cargo, setor, email FROM pessoa";

            $stmt= $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar(){
            
        }

        public function remover(){
            $query = "delete FROM pessoa WHERE id = :id";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(":id", $this->pessoa->__get('id'));
            $stmt->execute();
        }
    }



?>