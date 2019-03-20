<?php 
//-----includes------
	require_once 'functions/functions.php';
	carregaIncludes("functions/", array("config", "conexao", "database"));
//-----/includes-----
	date_default_timezone_set("BRAZIL/EAST"); 

		if(!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])){
			//flash e redirect
			flash("mensagem", "É necessário estar logado para acessar essa área!", "danger");
			header("Location: index.php");
		} 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>IT's Card! | Novo Card</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content=" " />
		<meta name="author" content="" />
		<meta name="keywords" content="" />
		<meta name="robots" content="index, folow" />
		<!--Icone-->
		<link rel="icon" type="image/x-icon" href="img/logo.ico">
		<!-- CSS Personaliado -->
  		<link rel="stylesheet" href="css/style.css">

		<!-- CSS do Bootstrap -->
  		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!--Font Awesome === ICONES MANEIROS-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!--Google Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
	</head>
	<body>
		<!--Cabeçalho-->
		<div class="container-fluid">
			<div class="row">
			     <nav class="navbar navbar-dark fixed-top bg-pantone p-0 shadow">
			  		<a class="navbar-brand col-sm-3 col-md-2 mr-0 h1 text-center" href="#">IT's Card!</a>
					<ul class="navbar-nav px-3 text-sm-center text-md-right">
						<li class="nav-item"><a class="nav-link " href="index.php">Sair</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="container-fluid">
			
			
	        <div class="row h">
		     	
	        	<!--Menu Lateral-->
				<nav class="navbar col-md-2 d-md-block navbar-dark bg-dark sidebar fixed-left mt-5 p-0" id="navbar">
					<div class="sidebar-sticky">
		        		<!--componentes aqui-->
		        		<ul class="navbar-nav my-3 w-100">
		        			<!--Icone Usuário-->
		        			<li class="nav-item mb-4 color-black w-100"><img src="img/user.png" class="user-image mr-2" alt="User Image">Admin</li>
					        <li class=" nav-item p-2"><a href="home.php?id=<?=$_SESSION['id'];?>" class="nav-link"><i class="fa fa-link"></i> <span>Página Inicial</span></a></li>
					        <li class="nav-item active p-2"><a href="cCard.php" class="nav-link"><i class="fa fa-link"></i> <span>Criar Novo Card</span></a></li>
					        
        
		        			
		        		</ul>        		
	        		</div>
	        	</nav>
				<!--Conteúdo Principal-->
	        	<div class="row col-md-10 bg-light p-5 h m-0" data-spy="scroll" data-target="#navbar" data-offset="0">

	        		<!--CARD-->
	        		<div class="col-md-12 mb-3 d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
		        		<form action="gCard.php" method="POST" autocomplete="off">
		        			<legend class="mb-5 h1 color-pantone">Cadastrar Novo Card</legend>
		        			<?= getFlash('mensagem') ?>
		        			<input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
		        			<input type="hidden" name="data" value="<?= date("Y-m-d H:i:s"); ?>">
		        			<div class="form-row my-2">
								<select name="tipo" class="form-control col-4 mr-2" required>
									<option value="Aviso">Aviso</option>
									<option value="Lembrete">Lembrete</option>
									<option value="Post-it">Post'it</option>
								</select>
								<input type="text" name="titulo" placeholder="*Titulo: " class="form-control col-7 ml-4" required>
							</div>
							<div class="form-row my-2">
								<textarea class="form-control" name="postagem" rows="10" placeholder="*Escreva aqui o conteúdo que quiser" required></textarea>
							</div>
		        			<div class="form-row-btn pt-4 mt-2 text-center">
								<button type="submit" class="btn btn-secondary col-3" name="cancelar">Cancelar</button>
								<button type="submit" class="btn btn-pantone col-3" name="cadastrar">Cadastrar</button>
							</div>
		        		</form>
	        		</div>
	        		<!--/CARD-->

	        		        		
	        	</div>
	        </div>
	    </div>
	         

		<!--/Conteúdo Principal-->
		<!--Modal Visualizar-->
		<div class="modal fade" id="modalVisualizar" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-tittle">Aqui vem o titulo</h5>
						<!--Botão pra close-->
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					</div>

					<div class="modal-body">
						<p class="lead text-justify">Aqui aparece o texto</p>
						
					</div>

					<div class="modal-footer">
				
						<a class="btn btn-pantone-red" data-dismiss="modal" href="#">Fechar</a>
					</div>
				</div>
				
			</div>
			
		</div>
		<!--/Modal-->

		<!--Modal Excluir-->
		<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-tittle">Excluir [tipo de card]</h5>
						<!--Botão pra close-->
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					</div>

					<div class="modal-body">
						<p class="lead text-justify">Deseja excluir esse card?</p>
						
					</div>

					<div class="modal-footer">
						<form action="gCard.php" method="POST">
							<input type="hidden" value="id" name="id">
							<a class="btn btn-secondary" data-dismiss="modal" href="#">Cancelar</a>
							<button type="submit" name="excluir" class="btn btn-pantone-red">Excluir</button>
							
						</form>
					</div>
				</div>
				
			</div>
			
		</div>
		<!--/Modal-->

		<!--Bootstrap-->
		<!-- Primeiro o jQuery, depois o Popper.js, e depois o Bootstrap JS -->
  	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<!--/Bootstrap-->
	</body>
</html>