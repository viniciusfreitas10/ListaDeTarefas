<?php
	class Tarefa{
		private $id;
		private $id_status;
		private $tarefa;
		private $data_cadastro;

		public function __get($atributo){
			return $this->$atributo;
		} 
		public function __set($atributo, $value){
			$this->$atributo = $value;
			return $this;
		}
	}
	class Cadastro{
		private $nome;
		private $id_usuario;
		private $email_cadastro;
		private $senha;
		public function __get($atributo){
			return $this->$atributo;
		}
		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}
	}
	class Login{
		private $email;
		private $senha;
		public function __get($atributo){
			return $this->$atributo;
		}
		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}
	}

?>