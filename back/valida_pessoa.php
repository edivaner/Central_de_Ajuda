<?
    require "../back/conection.php";
    require "../back/pessoa.php";
    require "../back/pessoaService.php";

    $pessoa = new Pessoa();
    $pessoa->__set('nome', $_POST['nome']);
    $pessoa->__set('email', $_POST['email']);
    $pessoa->__set('senha', $_POST['senha']);

		$conexao = new Conexao();

		$pessoaService = new pessoaService($conexao,$pessoa);
    $pessoaService->inserir();

    header('Location: cadastrar_pessoa.php?inclusao=1');
        
        
?>
