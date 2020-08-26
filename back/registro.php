<?php

    class Registro{
        private $id;
        private $titulo;
        private $idpessoa;
        private $categoria;
        private $descricao;
        private $status;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        
    }

?>