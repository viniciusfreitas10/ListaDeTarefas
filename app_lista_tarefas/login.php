<html>
  <head>
    <meta charset="utf-8" />
    <title>App Lista Tarefas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
    <script type="text/javascript">
      function requisitar(url){
        document.getElementById('conteudo').innerHTML = '';
        let ajax = new XMLHttpRequest();
        ajax.open('GET', url);
        ajax.onreadystatechange = function() {
          if(ajax.readyState == 4 && ajax.status == 200){
            document.getElementById('conteudo').innerHTML = ajax.responseText;

          }if (ajax.readyState == 4 && ajax.status == 404) {
            document.getElementById('conteudo').innerHTML='<h3 style="color:red;"> Erro na aquisição, verique a URL e tente novamente </h3>';
          }
        }
        ajax.send();

      }
    </script>
  </head>

  <body>
 
    <nav class="navbar navbar-light  bg-light">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Lista Tarefas
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login" id="conteudo">
          <div class="card">
            <div class="card-header d-flex justify-content-center">
              <h4>Login</h4>
            </div>
            <div class="card-body" >
              <form action="tarefa_controler.php?acao=entrar" method="post">
                <div class="form-group" >
                  <input type="email" name = "email"class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="senha" class="form-control" placeholder="Senha">
                </div>
                <?php 
                if(isset($_GET['login']) and $_GET['login'] == 'erro'){?>
                  <div class="text-danger">Usuário ou senha inválido(s)</div>
                <?php }?>
                <?php 

                  if (isset($_GET['login']) and  $_GET['login'] == 'erro2') {?>
                    <div class="text-danger">
                      Faça login antes de acessar as páginas
                    </div>
                  <?php }?>
                <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
                <p class="mt-1">Ainda não possui conta? <a href="#" onclick="requisitar('cadastrar.html')">Crie uma nova conta</a></p>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
