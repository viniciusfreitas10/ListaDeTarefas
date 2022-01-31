<?php
	require '../../../app_lista_tarefas/tarefa.model.php';
	require '../../../app_lista_tarefas/tarefa.service.php';
	require '../../../app_lista_tarefas/conexao.php';
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	if($acao == 'inserir'){
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao,$tarefa);
		$tarefaService->inserir();
		header('Location: nova_tarefa.php?inclusao=1');
	}else if($acao == 'recuperar'){
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
		
	}else if($acao == 'atualizar'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()){
			if(isset($_GET['pag']) and $_GET['pag'] == 'index'){
				header('Location: index.php');
			}else{
				header('Location: todas_tarefas.php ');
			}
		}
	}else if($acao == 'remover'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();
		if(isset($_GET['pag']) and $_GET['pag'] == 'index'){
				header('Location: index.php');
			}else{
				header('Location: todas_tarefas.php ');
			}
	}else if($acao == 'marcarRealizado'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		if(isset($_GET['pag']) and $_GET['pag'] == 'index'){
				header('Location: index.php');
			}else{
				header('Location: todas_tarefas.php ');
			}
	}else if($acao == 'cadastrar'){
		$cadastro = new Cadastro();
		$cadastro->__set('nome', $_POST['nome']);
		$cadastro->__set('email_cadastro', $_POST['email_cadastro']);
		$cadastro->__set('senha', $_POST['senha']);
		$conexao = new Conexao();
		$cadastra = new Cadastrar($conexao, $cadastro);
		$cadastra->cadastrar();
		header('Location: login.php');
	}else if($acao == 'entrar'){
		//if(empty($_POST['email'] || empty($_POST['senha']))){
		///	header('Location: login.php');
		//	exit();
		//}
		$login = new Login();
		$login->__set('email', $_POST['email']);
		$login->__set('senha', $_POST['senha']);
		$conexao = new Conexao();
		$valida = new ValidaLogin($conexao, $login);
		
				
		header('Location: index.php');
	}
	
		

?>
