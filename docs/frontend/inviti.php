<?php
	// Start the session
	session_start();
	
	$sName = $_SESSION["nome"];
	if (!isset($sName)) {
		header('Location: log-in.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- SEO Meta Tags -->
		<meta name="description" content="Sito aziendale per la gestione di sale e riunioni">
		<meta name="author" content="Riccardo Passoni, Nicolò Gastaldello">
		<!-- Website Title -->
		<title>Azienda.it - Pagina per la gestione degli inviti alle riunioni</title>
		<!-- Styles -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/fontawesome-all.css" rel="stylesheet">
		<link href="../css/magnific-popup.css" rel="stylesheet">
		<link href="../css/styles.css" rel="stylesheet">
		<link href="../css/tableriunioni.css" rel="stylesheet">
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
						<h1>Gestisci le riunioni alle quali sei invitato</h1>
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</header>
		<!-- end of ex-header -->
		<!-- end of header -->
		<div class="ex-basic-2">
			<div class="container">
				<?php
					if (isset($_GET["status"]) && $_GET["status"] == 'negaAccetta') {
						echo '<div style = "position:relative; top:-50px" class="alert alert-warning" role="alert">
							<i class="fas fa-exclamation-triangle"></i>
							Hai già accettato un invito ad una riunione per questa data e ora (o hai già accettato in precedenza tale invito)!
							</div>';
						}
					if (isset($_GET["status"]) && $_GET["status"] == 'ko') {
						echo '<div style = "position:relative; top:-50px" class="alert alert-danger" role="alert">
							<i class="fas fa-times"></i>
							Errore nella connessione/operazione con il database!
						</div>';
					} elseif (isset($_GET["status"]) && $_GET["status"] == 'ok') {
						echo '<div style = "position:relative; top:-50px" class="alert alert-success" role="alert">                      
						<i class="fas fa-check"></i>
						Operazione eseguita!
					</div>'; }
				?>
				<div class="row tabs" style = "position:relative; top:-50px">
					<div class="col-lg-12" style = "position:relative; left:0px; top:-60px">
						<div class="text-container last">
							<h3>Accetta o declina gli inviti per le riunioni alle quali sei stato invitato:</h3>
							<div class="table-responsive">
								<table class="table" style='table-layout: fixed; width: 100%'>
									<thead>
										<tr>
											<th style="overflow: auto" class="text-center">Data</th>
											<th style="overflow: auto">Creatore</th>
											<th></th>
											<th style="overflow: auto">Ora</th>
											<th style="overflow: auto">Durata</th>
											<th style="overflow: auto">Sala</th>
											<th style="overflow: auto">Dipartimento</th>
											<th style="overflow: auto">Tema</th>
											<th style="overflow: auto" class="text-center">Azioni</th>
										</tr>
									</thead>
									<tbody>
										<?php require "../backend/php/querypaginainviti.php";?>
									</tbody>
								</table>
							</div>
							<!-- end of text-container -->
						</div>
					</div>
					<!-- end of col-->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of ex-basic-2 -->
		<!-- Details Lightbox 1 -->
		<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
			<div class="container">
				<div class="row">
					<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
					<div class="col-lg-4">
						<h3>Accetta invito:</h3>
						<hr>
						<h5>Riepilogo:</h5>
						<div id="accetta">
						</div>
					</div>
					<!-- end of col -->
					<div class="col-lg-8 justify-content-center">
						<h4>
						<form action="../backend/php/rispInviti.php" method="post">
						<br><br>Vuoi confermare la tua presenza alla riunione?</h3>
						<a class="btn-outline-reg mfp-close as-button" href="#screenshots">INDIETRO</a> <button style="position:relative; top:0px" class="btn-solid-reg" type="submit"><u>CONFERMA</u></button>
						</form>
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of lightbox-basic -->
		<!-- Details Lightbox 2 -->
		<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
			<div class="container">
				<div class="row">
					<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
					<div class="col-lg-4">	
					<h3>Rifiuta invito:</h3>
						<hr>
						<h5>Riepilogo:</h5>
						<div id="rifiuta">
						</div>
					</div>
					<!-- end of col -->
					<div class="col-lg-8 justify-content-center">
						<h4>
						<br><br>Vuoi rifiutare l'invito alla riunione?</h3>
						<h6>Giustifica (campo obbligatorio):</h6>
						<form action="../backend/php/rispInviti.php" method="post">
							<input type="text" id="giustifica" name="giustifica" required>
							<a class="btn-outline-reg mfp-close as-button" href="#screenshots">INDIETRO</a> <button style="position:relative; top:0px" class="btn-solid-reg" type="submit"><u>RIFIUTA</u></button>
						</form>
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of lightbox-basic -->
		<?php require '../common/footer.html';?>
		<!-- Scripts -->
		<script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
		<script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
		<script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
		<script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
		<script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
		<script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
		<script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
		<script src="../js/scripts.js"></script> <!-- Custom scripts -->
		<script src="../js/ajax-datiinviti.js"></script>
	</body>
</html>