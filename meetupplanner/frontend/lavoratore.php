<?php
	// Start the session
	session_start();
	
	$sName = $_SESSION["nome"];
	$email = $_SESSION["email"];
	$ruolo = $_SESSION["ruolo"];
	if (!isset($sName)) {
		header('Location: log-in.php');
	}

	require "../backend/php/querypaginalavoratore.php";
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
						<?php echo '<h1>Ciao, '.$sName.'!</h1>'; ?>
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
					if (isset($_GET["status"]) && $_GET["status"] == 'ok') {
						echo '<div style = "position:relative; top:-50px" class="alert alert-success" role="alert">                      
								<i class="fas fa-check"></i>
								Operazione andata a buon fine!
							</div>';
						}
					if (isset($_GET["status"]) && $_GET["status"] == 'ko') {
						echo '<div style = "position:relative; top:-50px" class="alert alert-danger" role="alert">
							<i class="fas fa-times"></i>
							Errore nella connessione/operazione con il database!
						</div>';
					}
				?>
				<div class="row" style = "position:relative; top:-50px">
					<div class="col-lg-12" style = "position:relative">
						<!-- Features -->
						<div id="features" class="tabs">
							<div class="container" style = "position:relative; top:-50px">
								<div class="row">
									<div class="col-lg-12">
										<div class="above-heading">PROFILO</div>
										<h2 class="h2-heading">Visualizza i tuoi dati o quelli dei tuoi colleghi:</h2>
									</div>
									<!-- end of col -->
								</div>
								<!-- end of row -->
								<div class="row">
									<div class="col-lg-12">
										<!-- Tabs Links -->
										<ul class="nav nav-tabs" id="argoTabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"></i>Dati personali</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"></i>Modifica il tuo profilo</a>
											</li>
											<?php
												if ($ruolo == 'Direttore') {
													echo '<li class="nav-item">
															<a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"></i>Visualizza/Autorizza il profilo di un collega</a>
														</li>';
													}
											?>
										</ul>
										<!-- end of tabs links -->
										<!-- Tabs Content -->
										<div class="tab-content" id="argoTabsContent">
											<!-- Tab -->
											<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
												<div class="row">
													<div class="col-lg-6 text-center">
														<div class="image-container">
															<?php echo '<img alt="Foto profilo" class="img-fluid" src="data:image/jpeg;base64,'.base64_encode($row[4]).'"/>'; ?>
														</div>
														<!-- end of image-container -->
													</div>
													<!-- end of col -->
													<div class="col-lg-6">
														<div class="text-container">
															<?php
																if (!$res) {
																	echo '<p class="text-white">Errore: impossibile visualizzare i dati.</p>';
																	}
																elseif (isset($row)) {
																	echo '<h3>I tuoi dati</h3>
																	<button class="btn-solid-reg" onClick="window.location.reload();">REFRESH DATI</button>
																	<p><br></p>
																	<ul class="list-unstyled li-space-lg">
																		<li class="media">
																			<i class="fas fa-square"></i>
																			<div class="media-body">Email: '.$row[0].'</div>
																		</li>
																		<li class="media">
																			<i class="fas fa-square"></i>
																			<div class="media-body">Nome: '.$row[1].'</div>
																		</li>
																		<li class="media">
																			<i class="fas fa-square"></i>
																			<div class="media-body">Cognome: '.$row[2].'</div>
																		</li>
																		<li class="media">
																			<i class="fas fa-square"></i>
																			<div class="media-body">Data di nascita: '.$row[3].'</div>
																		</li>
																		<li class="media">
																			<i class="fas fa-square"></i>
																			<div class="media-body">Ruolo: '.$row[5].'</div>
																		</li>';
																		if ($ruolo == 'Direttore') {
																			echo '<li class="media">
																				<i class="fas fa-square"></i>
																				<div class="media-body">Data assunzione: '.$row[6].'</div>
																			</li>
																			<li class="media">
																				<i class="fas fa-square"></i>
																				<div class="media-body">Anni servizio: '.$row[7].'</div>
																			</li>';
																			}
																			
																		if ($ruolo != 'Direttore') {
																			echo '<li class="media">
																				<i class="fas fa-square"></i>
																				<div class="media-body">Nome dipartimento: '.$row[8].'</div>
																			</li>';
																			}
																		if (isset($row[9])) {
																			echo '<li class="media">
																				<i class="fas fa-square"></i>
																				<div class="media-body">Dirigente autorizzante: '.$row[9].'</div>
																			</li>
																			<li class="media">
																				<i class="fas fa-square"></i>
																				<div class="media-body">Data autorizzazione: '.$row[10].'</div>
																			</li>';
																			}
																	echo '</ul>';
																	}
																else {
																	echo '<p class="text-white">Errore: impossibile visualizzare i dati.</p>';
																	}
															?>
															<!-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a> -->
														</div>
														<!-- end of text-container -->
													</div>
													<!-- end of col -->
												</div>
												<!-- end of row -->
											</div>
											<!-- end of tab-pane -->
											<!-- end of tab -->
											<!-- Tab -->
											<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
												<div class="row">
													<div class="col-lg-6">
														<div class="text-container">
															<?php
																if (!$res) {
																	echo '<p class="text-white">Errore: impossibile visualizzare i dati.</p>';
																	}
																elseif (isset($row)) {
																	echo '<h3 class="text-center">Modifica i tuoi dati</h3>
																	<br>
																	<ul class="list-unstyled li-space-lg">
																<form onSubmit="return validateForm()" action="../backend/php/modificaDati.php" method="post" enctype="multipart/form-data">
																	<li class="media">
																		<div>
																			<i class="fas fa-square"></i>
																			<label for="fname">&nbspNome:</label>
																			<input onchange=validateForm() class="form-control input-sm" id="modNome" type="text" name="nome" placeholder='.$row[1].'>
																		</div>
																	</li>
																	<li class="media">
																		<div>
																			<i class="fas fa-square"></i>
																			<label for="lname">&nbspCognome:</label>
																			<input onchange=validateForm() class="form-control input-sm" id="modCogn" type="text" name="cognome" placeholder='.$row[2].'>
																		</div>
																	</li>
																	<div id="mod1">
																	</div>
																	<li class="media">
																		<div>
																			<i class="fas fa-square"></i>
																			<label for="lname">&nbspRuolo:</label><br>
																			<select class="custom-select input-sm" id="inputGroupSelect01" name="ruolo">
																			' ;
																			if ($ruolo == 'Funzionario') {
																			echo '<option selected value="Funzionario">Funzionario</option>
																				<option value="Impiegato semplice">Impiegato semplice</option>
																				<option value="Capo settore">Capo settore</option>';
																			}
																			elseif ($ruolo == 'Impiegato semplice') {
																				echo '<option selected value="Impiegato semplice">Impiegato semplice</option>
																					<option value="Funzionario">Funzionario</option>
																					<option value="Capo settore">Capo settore</option>';
																				}
																			elseif ($ruolo == 'Capo settore') {
																				echo '<option selected value="Capo settore">Capo settore</option>
																					<option value="Funzionario">Funzionario</option>
																					<option value="Impiegato semplice">Impiegato semplice</option>';
																				}
																			elseif ($ruolo == 'Direttore') {
																				echo '<option selected value="Direttore">Direttore</option>
																					<option value="Funzionario">Funzionario</option>
																					<option value="Impiegato semplice">Impiegato semplice</option>
																					<option value="Capo settore">Capo settore</option>;';
																				}
																		echo '</select>
																		</div>
																	</li>
																	<li class="media">
																		<div>
																			<i class="fas fa-square"></i>
																			<label for="lname">&nbspData di nascita:</label>
																			<input placeholder='.$row[3].' onchange=validateForm() class="form-control input-sm" type="text" onfocus=(this.type="date") onblur=(this.type="text") id="dataN" name="dataN">
																		</div>
																	</li>
																	<div id="mod2">
																	</div>
																	<li class="media">
																		<div>
																			<i class="fas fa-square"></i>
																			<label for="avatar">&nbspCarica una nuova foto profilo (max 1MB, jpg/png):</label>
																			<input type="file" class="form-control input-sm" id="avatar" accept="image/png, image/jpeg" name="foto">
																		</div>
																	</li>
															</ul>
														</div>
													</div>
													<div class="col-lg-6">
													<div class="text-container">
													<p><u>Modifica la password:</u><br><br></p>
													<ul class="list-unstyled li-space-lg">
														<li class="media">
															<div>
																<i class="fas fa-square"></i>
																<label for="lname">&nbspNuova password:</label>
																<input class="form-control input-sm" id="ps" type="password" name="password">
															</div>
														</li>
														<li class="media">
															<div>
																<i class="fas fa-square"></i>
																<label for="lname">&nbspConferma password:</label>';
																if (isset($_POST["password"])) {
																	echo '<input onchange=validateForm() class="form-control input-sm" id="cps" type="password" name="confermapassword" required>';
																} else {
																	echo '<input onchange=validateForm() class="form-control input-sm" id="cps" type="password" name="confermapassword">';
																}
																
															echo '</div>
														</li>
														<div id="mod3">
														</div>
													</ul>
													<button class="btn-solid-reg" type="reset" value="modifica"><i>CANCELLA</i></button> <button class="btn-solid-reg" type="submit" value="modifica"><u>INVIA MODIFICHE</u></button>
													</form>';
																					}
													?>
													</div> <!-- end of text-container -->
													</div>
												</div>
												<!-- end of row -->
											</div>	
															
											<!-- end of tab-pane -->
											<!-- end of tab -->
											<!-- Tab -->
											<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
												<div class="row">
													<div class="col">
													</div>
													<div class="col-lg-6" style="text-align:center">
														<div class="text-container">
															<?php
																if ($ruolo == 'Direttore') {
																	echo '<h3>Cerca/Autorizza un lavoratore</h3>
																	<ul class="list-unstyled li-space-lg">
																		<div class="media-body">
																			<label for="fname">Inserire la mail del lavoratore da cercare/autorizzare:</label><br>
																			<input class="form-control input-sm" id="ric_email" type="email">
																		</div>
																	</ul>
																	<a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-3" onClick="showUser(document.getElementById('; echo "'ric_email').value, 'ricercaP'"; echo ')">CERCA</a>';
																	}
															?>
														</div>
														<!-- end of text-container -->
													</div>
													<!-- end of col -->
													<div class="col">
													</div>
												</div>
												<!-- end of row -->
											</div>
											<!-- end of tab-pane -->
											<!-- end of tab -->
										</div>
										<!-- end of tab content -->
										<!-- end of tabs content -->
									</div>
									<!-- end of col -->
								</div>
								<!-- end of row -->
							</div>
							<!-- end of container -->
						</div>
						<!-- end of tabs -->
						<!-- end of features -->
						<!-- Details Lightboxes -->
						<!-- Details Lightbox 3 -->
						<div id="details-lightbox-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
							<div class="container">
								<div class="row" id="ricercaP">
								</div>
								<!-- end of row -->
							</div>
							<!-- end of container -->
						</div>
						<!-- end of lightbox-basic -->
						<!-- end of details lightbox 3 -->
						<!-- end of details lightboxes -->
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
		<script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
		<script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
		<script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
		<script src="../js/scripts.js"></script> <!-- Custom scripts -->
		<script src="../js/ajax-lavoratore.js"></script>
		<script src="../js/valForm.js"></script>
	</body>
</html>