<?php

    // class Pessoa{
    //     private $id;
    //     private $nome;
    //     private $email;
    //     private $senha;

    //     public function __get($atributo){
    //         return $this->$atributo;
    //     }

    //     public function __set($atributo, $valor){
    //         $this->$atributo = $valor;
    //     }
    // }
    
    class Pessoa{
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }



?>