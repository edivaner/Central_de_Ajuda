<?php

    class Registro{
        private $titulo;
        private $categoria;
        private $descricao;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        
    }

?>