<?php 
//-----includes------
	require_once 'functions/functions.php';
	carregaIncludes("functions/", array("config", "conexao", "database"));
//-----/includes-----
	date_default_timezone_set("BRAZIL/EAST"); 

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>IT's Card! | Cadastre-se</title>
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
	<body class="body bg-gray">
		<div class="container">
	        <div class="row justify-content-center align-items-center body">
	            <div class="col-md-8 col-sm-12 col-lg-5">
	                <div class="card">

	                	<div class="card-header text-center">
	                		<!--Logo-->
							<a class="navbar-brand mb-0" href="#"><h1 class="color-pantone">Cadastre-se</h1></a>
	                	</div>
	                    <div class="card-body">
	                        <form action="gLogin.php" method="POST" autocomplete="off">
								<?= getFlash('mensagem') ?>
	                        	<div class="input-group mb-2">
							    	<div class="input-group-prepend">
							          <div class="input-group-text"><i class="fas fa-user color-pantone"></i></div>
							        </div>
							        <input type="text" name="usuario" class="form-control color-pantone" id="" placeholder="Digite seu nome de usuário: ">
							        <button type="submitn" id="sendlogin" class="btn btn-pantone ml-1 mt-3 mt-md-0 col-md-3" name="cadastrar">Catastrar</button>
							    </div>
							    <div class="input-group d-flex justify-content-center">
							    	<small id="passwordHelpBlock" class="form-text text-muted">
									 	<a class="nav-link mt-3 color-pantone" href="index.php" title="cadastre-se">Já possui um cadastro? Clique aqui!</a>
									</small>
							    </div>
	                       		
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>
		



		<!--Bootstrap-->
		<!-- Primeiro o jQuery, depois o Popper.js, e depois o Bootstrap JS -->
  	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<!--/Bootstrap-->
	</body>
</html>