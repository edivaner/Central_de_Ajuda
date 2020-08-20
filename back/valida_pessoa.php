<?
    require "../back/conection.php";
    require "../back/pessoa.php";
    require "../back/pessoaService.php";
    require "../back/registro.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
      $pessoa = new Pessoa();
      $pessoa->__set('nome', $_POST['nome']);
      $pessoa->__set('cargo', $_POST['cargo']);
      $pessoa->__set('setor', $_POST['setor']);
      $pessoa->__set('email', $_POST['email']);
      $pessoa->__set('senha', $_POST['senha']);

      $conexao = new Conexao();

      $pessoaService = new pessoaService($conexao,$pessoa);
      $pessoaService->inserir();

      header('Location: cadastrar_pessoa.php?inclusao=1');

    }else if($acao == 'listagem'){
      $conexao = new Conexao();
      $pessoa = new Pessoa();
      $pessoaService = new pessoaService($conexao, $pessoa);

      $pessoas = $pessoaService->recuperar();
    }

    
        
        
?>
