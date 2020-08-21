<?php
    class Categoria{
        private $nome_categoria;

        public function __set($atributo, $valor){
            $this->atributo = $valor;
        }

        public function __get($atributo){
            return $this->atributo;
        }
    }

?>