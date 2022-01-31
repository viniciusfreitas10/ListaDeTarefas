<?php 
	$acao = 'recuperar';
	require 'tarefa_controler.php';

?>
<html>
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script type="text/javascript">
			function editar(id, txt){

				//criar um form de edição
				let form = document.createElement('form');
				form.action='index.php?pag=index&acao=atualizar';
				form.method='post';
				form.className ='row'
				//criar input para entrada
				let input = document.createElement('input');
				input.type = 'text';
				input.name='tarefa';
				input.className='col-9 form-control'
				input.value = txt
				//criar input hidden para uardar id da taref
				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id
				//criar um button para envio
				let button = document.createElement('button');
				button.type = 'submit';
				button.className= 'col-3 btn btn-info';
				button.innerHTML='Atualizar';
				//arvore de elementos

				form.appendChild(input);
				form.appendChild(inputId);
				//
				form.appendChild(button);
				let tarefa = document.getElementById('tarefa_'+id);
				tarefa.innerHTML = '';
				//incluir fomrm
				tarefa.insertBefore(form, tarefa[0])

			}
			function remover(id){
				location.href='index.php?pag=index&acao=remover&id='+id;
			}
			function marcar(id){
				location.href='index.php?pag=index&acao=marcarRealizado&id='+id;
			}
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />
								<?php foreach ($tarefas as $indice => $tarefa){ ?>
									<?php if($tarefa->status == 'pendente'){?>
									<div class="row mb-3 d-flex align-items-center tarefa">
									<div id="tarefa_<?=$tarefa->id?>" class="col-sm-9"><?= $tarefa->tarefa?></div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i style="cursor: pointer;" onclick="remover(<?=$tarefa->id?>)" class="fas fa-trash-alt fa-lg text-danger"></i>
										
										<i class="fas fa-edit fa-lg text-info" style="cursor: pointer;" onclick="editar(<?=$tarefa->id?>, '<?= $tarefa->tarefa?>')"></i>
										<i style="cursor: pointer;" class="fas fa-check-square fa-lg text-success" onclick="marcar(<?=$tarefa->id?>)"></i>

									</div>
								</div> <?php  } ?>
								<?php } ?> 
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>