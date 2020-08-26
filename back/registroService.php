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
            //$query = 'select r.id, r.titulo, r.id_categoria, r.descricao, r.id_pessoa, c.nome_categoria
            //FROM registro as r left join categoria as c  ON (r.id_categoria = c.id)
            //';
            $query = "select r.id, r.titulo, r.id_categoria, r.descricao, r.id_pessoa, c.nome_categoria, s.nome_status, r.status
            FROM registro r left join categoria c
            ON (r.id_categoria = c.id) left join status s on(r.status = s.id)";
            $stmt= $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function atualizar(){
            $query = "update registro set titulo = :titulo, id_categoria = :id_categoria, descricao = :descricao, id_pessoa = :id_pessoa, status = :status WHERE id = :id";
            
            $stmt = $this->conexao->prepare($query);
            
            
            $stmt->bindValue(':id', $this->registro->__get('id'));
            $stmt->bindValue(':titulo', $this->registro->__get('titulo'));
            $stmt->bindValue(':id_pessoa', $this->registro->__get('idpessoa'));
            $stmt->bindValue(':id_categoria',$this->registro->__get('categoria'));
            $stmt->bindValue(':status',$this->registro->__get('status'));
            $stmt->bindValue(':descricao', $this->registro->__get('descricao'));
            

            return $stmt->execute();

        }

        public function remover(){
            $query = "delete FROM registro WHERE registro.id = :id";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(":id", $this->registro->__get('id'));
            $stmt->execute();

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