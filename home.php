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
		<title>IT's Card! | Página Inicial</title>
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
				<nav class="navbar col-sm-12 col-md-2 d-md-block navbar-dark bg-dark sidebar fixed-left mt-5 p-0" id="navbar">
					<div class="sidebar-sticky">
						<div class="mt-5">
		        		<!--componentes aqui-->
		        		<ul class="navbar-nav my-3 w-100">
		        			<!--Icone Usuário-->
		        			<li class="nav-item mb-4 color-black w-100"><img src="img/user.png" class="user-image mr-2" alt="User Image">Admin</li>
					        <li class=" nav-item active p-2"><a href="home.php?id=<?=$_SESSION['id'];?>" class="nav-link"><i class="fa fa-link"></i> <span>Página Inicial</span></a></li>
					        <li class="nav-item p-2"><a href="cCard.php" class="nav-link"><i class="fa fa-link"></i> <span>Criar Novo Card</span></a></li>	
		        		</ul> 
		        		</div>       		
	        		</div>
	        	</nav>
				<!--Conteúdo Principal-->
	        	<div class="row col-md-10 bg-light p-5 h m-0" data-spy="scroll" data-target="#navbar" data-offset="0">
	        		<?php
	        			$id = addslashes($_GET['id']);
		        		$table = "cards";
		        		$where = "WHERE autor = '{$id}'";
	        			$count = dbCount($table, $where);
                            if($count > 0){
		        		
			        			$cards = dbRead($table, $where);
			        				if($cards){
				        				foreach ($cards as $value) {
		        	?>
					        				<!--CARD-->
							        		<div class="col-md-4 mb-3">
								        		<!--componentes aqui-->
								        		<div class="card text-center">
								        			<div class="card-header">
								        				<?= $value['tipo']; ?>
								        			</div>
								        			<div class="card-body">
								        				<h5 class="card-title"><?= $value['titulo']; ?></h5>
								        				<p class="card-text"><?= $value['postagem']; ?></p>
								        				<div class="d-flex flex-column col-12 align-items-center">
									        				<button class="btn btn-pantone-red col-6" data-id="<?= $value['id']; ?>" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
								        				</div>
								        			</div>
								        			<div class="card-footer text-muted">
								        				<?= $value['data']; ?>
								        			</div>
								        		</div>
							        		</div>
							        		<!--/CARD-->
					<?php	
										}		
				        			} else {
				        				flash("mensagem", "Não foi possivel exibir os cards cadastrados. Por favor, entre em contato com o suporte do sistema!", "danger");
				   ?>
						        		<div class="col-md-12 mb-3">
						        			<?= getFlash("mensagem"); ?>
						        		</div>
				    <?php
				        			}
				        	} else {
				        		flash("mensagem", "Não há cards cadastrados.", "secondary");
				    ?>
				        		<div class="col-md-12 mb-3">
				        			<div class="mt-5">
				        				<?= getFlash("mensagem"); ?>
				        			</div>
				        		</div>
				    <?php
				        	}
	        		?>
	        		
  		
	        	</div>
	        </div>
	    </div>
	         

		<!--/Conteúdo Principal-->

		<!--Modal Excluir-->
		<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-tittle">Excluir Card</h5>
						<!--Botão pra close-->
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					</div>

					<div class="modal-body">
						<p class="lead text-justify">Deseja excluir esse card?</p>
						
					</div>

					<div class="modal-footer">
						<form action="gCard.php" method="POST">
							<input type="hidden" id="id" name="id">
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
		<script type="text/javascript">
			$("#modalExcluir").on('show.bs.modal', function (event){
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var modal = $(this);
				modal.find('#id').val(id);
			});
		</script>
		
	</body>
</html>