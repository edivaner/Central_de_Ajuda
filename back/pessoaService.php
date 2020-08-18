<?php

    class PessoaService{
        private $conexao;
        private $pessoa;

        public function __construct(Conexao $conexao, Pessoa $pessoa){
			$this->conexao = $conexao->conectar();
			$this->pessoa = $pessoa;
        }

        public function inserir(){
            $query = "insert into pessoa (nome, email, senha)values(:nome,:email,:senha)";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->pessoa->__get('nome'));

            $stmt->bindValue(':email', $this->pessoa->__get('email'));

            $stmt->bindValue(':senha', $this->pessoa->__get('senha'));

            $stmt->execute();
             
        }

        public function recuperar(){

        }

        public function atualizar(){

        }

        public function remover(){

        }
    }



?>