<?php

	if(!empty($_POST['usuario']) and !empty($_POST['senha'])){
		$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
		$user = 'root';
		$senha = '';
		try{
			$conexao = new PDO($dsn, $user, $senha);
			$query = 'select * from tb_usuario where ';
			$query .= "email = :usuario AND senha = :senha";
			$smtm = $conexao->prepare($query);
			
			$smtm->bindValue(':usuario',$_POST['usuario']);
			$smtm->bindValue(':senha',$_POST['senha']);
			$smtm->execute();
			$usuario = $smtm->fetch();
			echo '<pre>';
			print_r($usuario);
			echo '</pre>';

		}catch(PDOException $e){
			echo 'Erro:'. $e->getCode(). ' Mensagem '.$e->getMessage();

		}
	}
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 text-center m-3">
				<form method="post" action="sql_injection.php" class="form-group">
				<input class="form-control" type="text" placeholder="usuario" name="usuario">

				<input class="form-control" type="password"  placeholder="senha" name="senha">

				<button class="form-control btn btn-success" type="submit">Entrar</button>
	</form>
			</div>
		</div>
	</div>
	
</body>
</html>