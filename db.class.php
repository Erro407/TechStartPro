<?php
	
	class db{
		//host
		private $host = 'localhost';

		//user
		private  $usuario = 'root';

		//password
		private $senha = '';

		//bd
		private $dataBase = 'olist';


		public function conecta_mysql(){
			
			//cria conexao
			$con = mysqli_connect($this-> host, $this ->  usuario, $this ->  senha , $this -> dataBase);

			//ajusta o charset entre a aplicação e o banco de dados
			mysqli_set_charset($con, 'utf8');

			//Verifica se houve erro de conexao
			if(mysqli_connect_errno()){
				echo 'houve erro ao tentar conexar com o banco de dados Mysql: '.mysqli_connect_error();
			}

			return $con;
		}
	}

?>