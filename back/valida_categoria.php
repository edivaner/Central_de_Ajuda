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

    } else if($acao == 'atualizar'){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

		$categoria = new Categoria();
        
        $categoria->__set('nome_categoria', $_POST['categoria']);
        $categoria->__set('id', $_POST['id']);

		$conexao = new Conexao();

        $categoriaService = new categoriaService($conexao, $categoria);

        //echo $categoriaService->atualizar();
        
		if($categoriaService->atualizar()){
            //print_r($categoriaService->atualizar());
            header('Location: categoria.php?');

			// if(isset($_GET['pag']) && $_GET['pag'] == 'categoria'){
			// 	header('Location: categoria.php');
			// }else{
			// 	header('Location: home.php');
            // }
        }
        
	}else if($acao=='remover'){
        $categoria = new Categoria();
		$categoria->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$categoriaService = new categoriaService($conexao, $categoria);
        $categoriaService->remover();
        
        header("Location: categoria.php");
    }

?>