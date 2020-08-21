<html>
  <head>
    <meta charset="utf-8" />
    <title>Cadastrando Usuário - ADMINISTRADOR</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
      a:link {
        text-decoration: none;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Assistência a departamentos
      </a>
    </nav>
    
    <? if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>
      <div class="bg-info pt-2 text-white d-flex justify-content-center">
        <h5>Novo usuário cadastrado com sucesso. Bom trabalho !</h5>
      </div>
    <?}?>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Olá, administrador. Cadastre um novo usuário.
            </div>
            <div class="card-body">
              <form action='valida_pessoa.php?acao=inserir' method='post' >
                <div class="form-group">
                  <input type="name" class="form-control" placeholder="Nome" name='nome'>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Cargo" name='cargo'>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Setor" name='setor'>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control" placeholder="E-mail" name='email'>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Senha" name='senha'>
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
              </form>
              <div class="row mt-5">
                <div class="col-12">
                  <a href="home.php">
                    <button class="btn btn-lg btn-warning btn-block text-white">Voltar</button>
                  </a>
                </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>