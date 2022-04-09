 <?php
	// Start the session
	session_start();
	
	if (!isset($_SESSION["nome"])) {
		header('Location: log-in.php');
	} elseif (!isset($_SESSION["autorizzazione"]) && $_SESSION["ruolo"] != 'Direttore') {
		header('Location: lavoratore.php');
	 }

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
						<h1>Visualizza le riunioni passate dell'azienda</h1>
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
				<div class="row tabs" style = "position:relative; top:-50px">
					<div class="col-lg-12" style = "position:relative; left:0px; top:-35px">
						<h4>Riunioni:</h4>
						<a onClick="showRiunioniImp();" style="cursor: pointer; cursor: hand; color:#5f4dee"><u><b>Clicca qui per vedere le riunioni più importanti dell'azienda.</u></b></a>
						<form onreset='setTimeout(showSvolte, 1)' style = "position:relative; left:0px; top: 5px">
                     <div class="row">
                        <div class="col">
                           <p>Dipartimento:</p>
                           <select onchange="showSvolte()" class="form-control" id="dip">
                              <option value="">...</option>
                              <option>Contabilità</option>
                              <option>Marketing</option>
                              <option>Produzione</option>
                              <option>Ricerca</option>
                              <option>Risorse umane</option>
                           </select>
                        </div>
                        <div class="col">
                           <p>Filtra per anno:</p>
                           <input onchange="showSvolte()" id="anno" autocomplete="off" class="form-control" type="number" min="1990" max="<?php echo date("Y")?>" step="1" value="">
                        </div>
                        <div class="col">
                           <p>Filtra per mese:</p>
                           <input onchange="showSvolte()" id="mese" autocomplete="off" type="month" min="1990-01" max="<?php echo date('Y')?>-<?php echo date('m')?>" class="form-control" placeholder="...">
                        </div>
                        <div class="col">
                           <p>Filtra per settimana:</p>
                           <input onchange="showSvolte()" id="settimana" autocomplete="off" min="1990-W01" max="<?php echo date('Y')?>-W<?php echo date('W')?>" type="week" class="form-control" placeholder="...">
                           </div>
                        <div class="col">
                           <p>Filtra per giorno:</p>
                           <input onchange="showSvolte()" id="giorno" min="1990-01-01" max="<?php echo date("Y-m-d", strtotime("yesterday"))?>" autocomplete="off" type="date" class="form-control" placeholder="...">
                        </div>
                        <div>
                           <button style = "position:relative; left:-5px; top:40px" class="btn-solid-reg" type="reset">RESET</button>
                        </div>
                     </div>
                  </form>
						<div style="position:relative; top:15px"class="table-responsive" id="riunioniA">
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
										<th style="overflow: auto" class="text-center">Partecipanti</th>
									</tr>
								</thead>
								<tbody>
									<?php require "../backend/php/querypaginariunioni_passate.php";?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- end of col-->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</div>
		<!-- end of ex-basic-2 -->
		<!-- end of gestione content -->
		<!-- Details Lightbox 2 -->
		<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
					<div id="vecchiinvitati">
				    </div>
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
		<script src="../js/ajax-invitati_riunionipassate.js"></script>
		<script src="../js/showRiunioniImp.js"></script>
		<script src="../js/ajax-filtroriunionisvolte.js"></script>
	</body>
</html>