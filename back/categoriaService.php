<?php

    class categoriaService{
        private $conexao;
        private $categoria;

        public function __construct(Conexao $conexao, Categoria $categoria){
            $this->conexao = $conexao->conectar();
            $this->categoria = $categoria;
        }

        public function inserir(){
            $query = "insert into categoria(nome_categoria) values(:nome_categoria)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_categoria', $this->categoria->__get('nome_categoria'));
            $stmt->execute();
        }

        public function recuperar(){
            $query = 'select id, nome_categoria FROM categoria';
            $stmt= $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarQtd(){
            $query = "select COUNT(id_categoria) FROM registro where id_categoria = 1";
            $stmt= $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function atualizar(){
            $query = "update categoria set nome_categoria = :categoria WHERE id = :id";
            
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':categoria',$this->categoria->__get('nome_categoria'));
            $stmt->bindValue(':id', $this->categoria->__get('id'));

            return $stmt->execute();
        }
        
        public function remover(){
			$query = "delete from categoria where id = :id";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(":id", $this->categoria->__get('id'));
            $stmt->execute();
            
            
		}


    }

?>