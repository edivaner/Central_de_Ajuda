<?php
 header('Location: home.php');

 //login ficara pronto quando usar o banco de dados para identificar a instancia do login e seus registros.
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>HELP-ME </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Assistência a departamentos
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action='' method='post' >
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="E-mail" name='email'>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Senha" name='senha'>
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>