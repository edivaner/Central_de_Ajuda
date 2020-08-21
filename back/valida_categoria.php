<?php

    require "../back/conection.php";
    require "../back/pessoa.php";
    require "../back/pessoaService.php";
    require "../back/registro.php";
    require "../back/categoria.php";
    require "../back/categoriaService.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao=='inserir'){
        $categoria = new Categoria();
        $categoria->__set('nome_categoria',$_POST['categoria']);

        $conexao = new Conexao();
        $categoriaService = new categoriaService($conexao,$categoria);

        $categoriaService->inserir();

        header('Location: categoria.php?inclusao=1');

    }else if($acao == 'listagem'){
        $conexao = new Conexao();
        $categoria = new Categoria();
        $categoriaService = new categoriaService($conexao, $categoria);
  
        $categorias = $categoriaService->recuperar();
    }

?>