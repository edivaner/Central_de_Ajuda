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

            //$query = "update registro set titulo = 'Teste rapido +', id_categoria = 1, descricao = 'PC esquentando muitooo', id_pessoa = 2, status = :status WHERE id = 39";
            
            $stmt = $this->conexao->prepare($query);
            
            
            $stmt->bindValue(':id', $this->registro->__get('id'));
            $stmt->bindValue(':titulo', $this->registro->__get('titulo'));
            $stmt->bindValue(':id_pessoa', $this->registro->__get('idpessoa'));
            $stmt->bindValue(':id_categoria',$this->registro->__get('categoria'));
            $stmt->bindValue(':status',$this->registro->__get('status'));
            $stmt->bindValue(':descricao', $this->registro->__get('descricao'));
            

            return $stmt->execute();

            //print_r($this->registro);

            //return $this->registro;

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

        public function marcarRealizada(){
			$query = "update registro set status = ? where id = ?";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->registro->__get('status'));
			$stmt->bindValue(2, $this->registro->__get('id'));
			return $stmt->execute();
		}

		public function recuperarPendentes(){
			$query = "
            SELECT r.id, r.titulo, r.id_pessoa, r.id_categoria, c.nome_categoria, r.descricao, s.id, s.nome_status
            FROM registro r left join categoria c
            ON(r.status = c.id) LEFT join status s ON(r.status = s.id)
            WHERE r.status = 1

					";

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id_status',$this->registro->__get('status'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);

		}
    }

?>