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
		<title>Azienda.it - Sito aziendale per la gestione di sale e riunioni</title>
		<!-- Styles -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/fontawesome-all.css" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/framedimage.css" rel="stylesheet">
		<!-- Favicon  -->
		<link rel="icon" href="images/favicon.png">
		<!-- icona piccola di scheda -->
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
		<?php require 'common/navbarForIndex.php';?>
		<!-- Header -->
		<header id="header" class="header">
			<div class="header-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-xl-5">
							<div class="text-container" style = "position:relative; left:-20px; top:-80px">
								<?php
									if (!isset($_SESSION["nome"])) {
										echo '<h1>Benvenuto nel sito ufficiale di Azienda.it!</h1>
											<p class="p-large">Effettua il login per gestire o creare le tue riunioni.</p>
											<a class="btn-solid-lg page-scroll" style = "position:relative; top:-20px" href="frontend/log-in.php" >ACCEDI</a>
											<p class="p-large">Non hai ancora creato un account nel nostro sistema aziendale?</p>
											<a class="btn-solid-lg page-scroll" style = "position:relative; top:-20px" href="frontend/sign-up.php">REGISTRATI</a>';
										}
									else {
										$sName = $_SESSION["nome"];
										echo '<h1>Benvenuto/a '.$sName.' nel sito ufficiale di Azienda.it!</h1>
											<p class="p-large">Controlla le tue informazioni:</p>
											<a class="btn-solid-lg page-scroll" style = "position:relative; top:-20px" href="frontend/lavoratore.php" >IL TUO PROFILO</a>';
										}
								?>
							</div>
							<!-- end of text-container -->
						</div>
						<!-- end of col -->
						<div class="col-lg-6 col-xl-7">
							<div class="image-container">
								<div class="img-wrapper" style = "position:relative; top:0px">
									<img class="framed" src="images/azienda.jpg" alt="alternative"> 
								</div>
								<!-- end of img-wrapper -->
							</div>
							<!-- end of image-container -->
						</div>
						<!-- end of col -->
					</div>
					<!-- end of row -->
				</div>
				<!-- end of container -->
			</div>
			<!-- end of header-content -->
		</header>
		<!-- end of header -->
		<svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310">
			<defs>
				<style>.cls-1{fill:#5f4def;}</style>
			</defs>
			<title>header-frame</title>
			<path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/>
		</svg>
		<!-- end of header -->
		<!-- Description -->
		<div class="cards-1">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="above-heading">FUNZIONI</div>
						<h2 class="h2-heading">Ecco cosa puoi fare all'interno del nostro sito:</h2>
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
				<div class="row">
					<div class="col-lg-12">
						<!-- Card -->
						<div class="card">
							<div class="card-image">
								<img class="img-fluid" src="images/description-1.png" alt="alternative">
							</div>
							<div class="card-body">
								<h4 class="card-title">Effettua ricerche</h4>
								<p>Cerca le riunioni passate ed in programma.</p>
							</div>
						</div>
						<!-- end of card -->
						<!-- Card -->
						<div class="card">
							<div class="card-image">
								<img class="img-fluid" src="images/description-2.png" alt="alternative">
							</div>
							<div class="card-body">
								<h4 class="card-title">Crea e inserisci nuovi dati</h4>
								<p>Se possiedi i permessi necessari puoi creare e gestire riunioni.</p>
							</div>
						</div>
						<!-- end of card -->
						<!-- Card -->
						<div class="card">
							<div class="card-image">
								<img class="img-fluid" src="images/description-3.png" alt="alternative">
							</div>
							<div class="card-body">
								<h4 class="card-title">Tieniti aggiornato sulla partecipazione alle varie riunioni</h4>
								<p>Controlla chi può partecipare alle riunioni.</p>
							</div>
						</div>
						<!-- end of card -->
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of cards-1 -->
		<!-- end of description -->
		<!-- Details -->
		<div id="details" class="basic-1 tabs">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="text-container">
							<h2>Azienda.it: un'azienda italiana!</h2>
							<p>Azienda.it è un'azienda italiana con sede a Milano.</p>
							<ul class="list-unstyled li-space-lg">
								<li class="media">
									<i class="fas fa-square"></i>
									<div class="media-body">Possiede obiettivi chiari.</div>
								</li>
								<li class="media">
									<i class="fas fa-square"></i>
									<div class="media-body">Nasce nel 1990.</div>
								</li>
							</ul>
							<?php
							if (!isset($_SESSION["nome"])) {
										echo "<p>Fai parte dell'azienda, non sei ancora registrato o vuoi creare un nuovo account? Registrati ora!</p>
											<a class='btn-solid-reg page-scroll' href='frontend/sign-up.php'>REGISTRATI</a>";
										}
									else {
										$sName = $_SESSION["nome"];
										echo '<p>Benvenuto/a '.$sName.'!</p>
											<p>Controlla le tue informazioni:</p> <a class="btn-solid-lg page-scroll" href="frontend/lavoratore.php" >IL TUO PROFILO</a>';
										}
							?>
						</div>
						<!-- end of text-container -->
					</div>
					<!-- end of col -->
					<div class="col-lg-6">
						<div class="image-container">
							<img class="img-fluid" src="images/azienda-2.jpg" alt="alternative">
						</div>
						<!-- end of image-container -->
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of basic-1 -->
		<!-- end of details -->
		<div class="cards-1">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="h2-heading"><i>Azienda.it: un'azienda italiana!</i></h2>
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of cards-1 -->
		<?php require 'common/footer.html';?>
		<!-- Scripts -->
		<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
		<script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
		<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
		<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
		<script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
		<script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
		<script src="js/scripts.js"></script> <!-- Custom scripts -->
	</body>
</html>