<?php
    //CRUD
    class registroService{
        private $conexao;
        private $registro;

        public function __construct(Conexao $conexao, Registro $registro){
			$this->conexao = $conexao->conectar();
			$this->registro = $registro;
        }
        
        public function inserir(){
            $query = "insert into registro (titulo, id_pessoa, id_categoria, descricao)values(:titulo,:id_pessoa,:id_categoria,:descricao)";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':titulo', $this->registro->__get('titulo'));

            $stmt->bindValue(':id_pessoa', 1);

            $stmt->bindValue(':id_categoria', $this->registro->__get('categoria'));

            $stmt->bindValue(':descricao', $this->registro->__get('descricao'));

            $stmt->execute();

            

        }

        public function recuperar(){
            $query = 'select r.id, r.titulo, r.id_categoria, r.descricao, c.id, c.nome_categoria
            FROM registro as r left join categoria as c  ON (r.id_categoria = c.id)
            ';
            $stmt= $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function atualizar(){

        }

        public function remover(){

        }

        public function recuperarCategoria(){
            $query = 'select id, nome_categoria
            FROM categoria
            ';
            $stmt= $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }
    }

?>