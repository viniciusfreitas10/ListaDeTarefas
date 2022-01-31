<?php
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
	$user = 'root';
	$senha = '';
	
	try{
		$conexao = new PDO($dsn, $user, $senha);
		$query = '
		select * from tb_usuario 
		';
		
		foreach($conexao->query($query) as $key => $valor){
			print_r($valor['nome']);
			echo '<hr>'; 	
		}

		/*
		$stmt = $conexao->query($query);
		//PDO::FETCH_ASSOC -> RETORNA APENAS OS NOMES COM ESTÁ NA TABELA
		
		
		$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//print_r($resultado);
		
		echo '<pre>';
		print_r($usuarios);
		echo '</pre>';
		
		foreach($usuarios as $key => $valor){
			print_r($valor['nome']);
			echo '<br>';
			print_r($valor['email']);
			echo '<hr>';

		}*/

	}catch(PDOException $e){
		echo 'Erro:'. $e->getCode(). ' Mensagem '.$e->getMessage();

	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>

</body>
</html>