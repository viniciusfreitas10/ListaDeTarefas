<?php 
	session_start();
	class TarefaService{
		private $conexao;
		private $tarefa;
		public function __construct(conexao $conexao, Tarefa $tarefa){
			$this->conexao = $conexao->conectar();
			$this->tarefa = $tarefa;
		}
		public function inserir(){//creat
			$query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
			$stmt->execute();

		}
		public function recuperar(){//read
			$query = 'select 
							t.id,s.status, t.tarefa 
					from tb_tarefas as t
						left join tb_status as s on(t.id_status = s.id)
							';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		public function atualizar(){//update
			$query = '
				update tb_tarefas set tarefa = ? where id = ?
			';
			//ponto de interregoçao é lido na sequencia
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
			$stmt->bindValue(2, $this->tarefa->__get('id'));
			return $stmt->execute();

		}
		public function remover(){//delete
			$query='
			delete from tb_tarefas where id = ?
			';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->__get('id'));
			$stmt->execute();

		}
		public function marcarRealizada(){
			$query = '
				update tb_tarefas set id_status = ? where id = ?
			';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->__get('id_status'));
			$stmt->bindValue(2, $this->tarefa->__get('id'));
			return $stmt->execute();
		}
		
	}
	class Cadastrar extends TarefaService{
		private $conexao;
		private $cadastro;
		public function __construct(conexao $conexao, $cadastro){
			$this->conexao = $conexao->conectar();
			$this->cadastro = $cadastro;
		}
		public function cadastrar(){
			$query = '
			insert into tb_usuarios(nome,email,senha)values(:nome,:email, :senha)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':nome', $this->cadastro->__get('nome'));
			$stmt->bindValue(':email', $this->cadastro->__get('email_cadastro'));
			$stmt->bindValue(':senha', $this->cadastro->__get('senha'));
			return $stmt->execute();
		}		
	}
	class ValidaLogin extends Cadastrar{
		public function __construct(conexao $conexao, $login){
			$this->conexao = $conexao->conectar();
			$this->login = $login;
		}
		public function recuperar(){//read
			$query = 'select 
							* 
					from tb_usuarios as t
						left join tb_status as s on(t.id_status = s.id)
							';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		public function valida(){
			$query ='
			select * from tb_usuarios where email = :email and senha = :senha  
			';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':email', $this->login->__get['email']);
			$stmt->bindValue(':senha', $this->login->__get['senha']);

			return $stmt->execute();
		}
	}
?>