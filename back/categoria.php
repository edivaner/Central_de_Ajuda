<?php
    // class Categoria{
    //     private $id = '2000';
    //     private $nome_categoria ="bala";


    //     public function __get($atributo){
    //         return $this->atributo;
    //     }

    //     public function __set($atributo, $valor){
    //         $this->atributo = $valor;
    //     }

        
    // }

    class Categoria{
        private $id;
        private $nome_categoria;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }

    // $cat = new Categoria();
    // $cat->__set('id','5802');
    // $cat->__set('nome_categoria','2032220');
    
    // echo $cat->__get('id');
    // echo '<hr>';
    // echo $cat->__get('nome_categoria');

?>