<?php
//-----includes------
  require_once 'functions/functions.php';
  carregaIncludes("functions/", array("config", "conexao", "database"));
//-----/includes-----
	//gravar dados e checar
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['entrar']) || !empty($_POST['entrar'])){
			//funções de login
			$usuario = addslashes($_POST['usuario']);
			if(isset($usuario) || !empty($usuario)){
				$where = "WHERE usuario = '{$usuario}'";
				$query = dbRead('usuario', $where);
					if($query == false){
						//n logou
						//flash que usuário não existe
						flash("mensagem", "O usuário informado não existe!", "danger");
						header("Location: index.php");
					} else {
						//logou
						$where = "WHERE usuario = '{$usuario}'";
						$select = dbRead("usuario", $where);
							foreach ($select as $value) {
								$_SESSION['id'] = $value['id'];
								$_SESSION['usuario'] = $value['usuario']; 
							}
						header("Location: home.php?id={$_SESSION['id']}");
						 
					}
			} else {
					//flash que usuário não existe
				flash("mensagem", "Informe o usuário!", "danger");
				header("Location: index.php");
			}
			

		} else if(isset($_POST['cadastrar']) || !empty($_POST['cadastrar'])){
			//funções de cadastro de usuário
			//funções de login
			$usuario = addslashes($_POST['usuario']);
				if(isset($usuario) || !empty($usuario)){
					$existsUser = ifExistsUser($usuario); //função que verifica se usuário existe (database.php)
						if($existsUser == true){
							$insert = array("usuario" => "$usuario");
							$query = dbCreate('usuario', $insert);
								if(!$query){
									//n cadastrou
									//flash que usuário não existe
									flash("mensagem", "Não foi possivel cadastrar usuário. Por favor, entre em contato com o suporte do sistema!", "danger");
									header("Location: cLogin.php");
								} else {
									flash("mensagem", "O usuário informado foi cadastrado com sucesso!", "success");
									header("Location: cLogin.php");
									 
								}
						} else {
							flash("mensagem", "O usuário informado já existe. Por favor, tente outro nome de usuário!", "danger");
							header("Location: cLogin.php");
						}
					
					} else {
						//flash que usuário não existe
						flash("mensagem", "Informe o usuário!", "danger");
						header("Location: cLogin.php");
					}

		} else {
			header("Location: index.php");
		}
	} else {
		header("Location: index.php");
	}
?>