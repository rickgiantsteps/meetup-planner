<?php
	// Start the session
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- SEO Meta Tags -->
		<meta name="description" content="Sito aziendale per la gestione di sale e riunioni.">
		<meta name="author" content="Riccardo Passoni, Nicolò Gastaldello">
		<!-- Website Title -->
		<title>Azienda.it - Pagina per la gestione generale di riunioni</title>
		<!-- Styles -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/fontawesome-all.css" rel="stylesheet">
		<link href="../css/magnific-popup.css" rel="stylesheet">
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Favicon  -->
		<link rel="icon" href="../images/favicon.png">
	</head>
	<body data-spy="scroll" data-target=".fixed-top">
		<!-- Preloader -->
		<div class="spinner-wrapper">
			<div class="spinner">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
		<!-- end of preloader -->
		<?php require '../common/navbar.php';?>
		<!-- Header -->
		<header id="header" class="ex-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Dipartimenti dell'azienda</h1>
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</header>
		<!-- end of ex-header -->
		<!-- end of header -->
		<!-- Gestione Content -->
		<div class="ex-basic-2">
			<div class="container">
				<?php
					if (isset($_GET["status"]) && $_GET["status"] == 'ko') {
						echo '<div style = "position:relative; top:-50px" class="alert alert-danger" role="alert">
							<i class="fas fa-times"></i>
							Errore nella connessione/operazione con il database!
						</div>';
					}
				?>
				<div class="row" style = "position:relative; top:-50px">
				<div class="col-lg-12">
					<!-- Dipartimenti -->
					<div id="dipartimenti" class="cards-2 tabs">
						<div class="row">
							<div class="col-lg-12">
								<div class="above-heading">DIPARTIMENTI</div>
								<h2 class="h2-heading">Esplora i dipartimenti dell'azienda:</h2>
							</div>
							<!-- end of col -->
						</div>
						<!-- end of row -->
						<div class="row">
							<div class="col-lg-12">
							<?php require '../backend/php/querypaginadipartimenti.php';?>
								</div>
								<!-- end of col -->
							</div>
							<!-- end of row -->
						</div>
						<!-- end of cards-2 -->
						<!-- end of dipartimenti -->
					</div>
					<!-- end of col-->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of ex-basic-2 -->
		<!-- end of gestione content -->
		<?php require '../common/footer.html';?>
		<!-- Scripts -->
		<script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
		<script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
		<script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
		<script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
		<script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
		<script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
		<script src="../js/scripts.js"></script> <!-- Custom scripts -->
	</body>
</html>