<?php
//-----includes------
	require_once 'functions/functions.php';
	carregaIncludes("functions/", array("config", "conexao", "database"));
//-----/includes-----
	//gravar dados e checar
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['cadastrar']) || !empty($_POST['cadastrar'])){
			//funções de login
			$id = addslashes($_POST['id']);
			$data = addslashes($_POST['data']);
			$tipo = addslashes($_POST['tipo']);
			$titulo = addslashes($_POST['titulo']);
			$postagem = addslashes($_POST['postagem']);
				if(empty($tipo) || empty($titulo) || empty($postagem)){
					//flash que usuário não existe
					flash("mensagem", "Preencha todos os campos!", "danger");
					header("Location: cCard.php");
				} else {
					$existsCard = ifExistsCard($titulo); //função que verifica se usuário existe (database.php)
						if($existsCard == true){
							$campos = array(
								"autor" => "$id",
								"tipo" => "$tipo",
								"data" => "$data",
								"titulo" => "$titulo",
								"postagem" => "$postagem" 
							);
							$query = dbCreate('cards', $campos);
								if($query == false){
									//flash que usuário não existe
									flash("mensagem", "Não foi possivel cadastrar card!", "danger");
									header("Location: cCard.php");
								} else {
									//cadastrou
									//flash que usuário não existe
									flash("mensagem", "O card foi cadastrado com sucesso!", "success");
									header("Location: cCard.php");
									 
								}
							
						} else {
							flash("mensagem", "Esse titulo do card já existe. Por favor, tente outro titulo!", "danger");
							header("Location: cCard.php");
							
						}
					
				}
			

		} else if(isset($_POST['excluir']) || !empty($_POST['excluir'])){
			//excluir
			$id = addslashes($_POST['id']);
			$table = "cards";
			$where = "id = $id"; 
				if(dbDelete($table, $where)){
					flash("mensagem", "O card foi excluído com sucesso!", "success");
					header("Location: home.php?id={$_SESSION['id']}");
				} else {
					flash("mensagem", "Não foi possivel excluir card!", "danger");
					header("Location: home.php?id={$_SESSION['id']}");
				}	

		} else if(isset($_POST['cancelar']) || !empty($_POST['cancelar'])){
			header("Location: home.php?id={$_SESSION['id']}");

		} else {
			header("Location: home.php?id={$_SESSION['id']}");
		}
	} else {
		header("Location: home.php?id={$_SESSION['id']}");
	}


?>