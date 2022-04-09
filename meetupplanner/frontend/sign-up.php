<?php
	// Start the session
	session_start();

	if (isset($_SESSION["nome"])) {
		header('Location: lavoratore.php');
   }
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- SEO Meta Tags -->
		<meta name="description" content="Sito aziendale per la gestione di sale e riunioni">
		<meta name="author" content="Passoni, Gastaldello">
		<!-- Website Title -->
		<title>Azienda.it - Sito aziendale per la gestione di sale e riunioni</title>
		<!-- Styles -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/fontawesome-all.css" rel="stylesheet">
		<link href="../css/magnific-popup.css" rel="stylesheet">
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Favicon  -->
		<link rel="icon" href="../images/favicon.png">
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
		<?php require '../common/navbar.php';?>
		<!-- Header -->
		<header id="header" class="ex-2-header">
			<div class="container" style = "position:relative; top:-50px">
				<div class="row">
					<div class="col-lg-12">
						<h1>Registrati</h1>
						<p>Inserisci i tuoi dati per registrarti nel sistema aziendale. Già iscritto? <a class="white" href="log-in.php">Accedi</a>.</p>
						<!-- Sign Up Form -->
						<div class="form-container">
							<form onSubmit="return validateForm()" id="signUpForm" data-toggle="validator" data-focus="false" action="../backend/php/signupValidatore.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input onchange=validateForm() autocomplete="off" type="text" class="form-control-input" id="modNome" name="nome" required>
									<label class="label-control" for="modNome">Nome</label>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input onchange=validateForm() autocomplete="off" type="text" class="form-control-input" id="modCogn" name="cognome" required>
									<label class="label-control" for="modCogn">Cognome</label>
									<div class="help-block with-errors"></div>
								</div>
								<div id="mod1">
								</div>
								<div class="form-group">
									<input onchange=validateForm() autocomplete="off" type="date" class="form-control-input" id="dataN" name="dataN" required>
									<label class="label-control" for="sname" style = "position:absolute; top:-1px">Data di nascita</label>
									<div class="help-block with-errors"></div>
								</div>
								<div id="mod2">
								</div>
								<div class="form-group">
									<input autocomplete="off" type="file" class="form-control-input" id="avatar" accept="image/png, image/jpeg" name="foto" required>
									<label class="label-control" for="sname" style = "position:absolute; top:-1px">Foto (max 1MB, jpg/png)</label>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="inputGroupSelect01">Ruolo</label>
										</div>
										<select autocomplete="off" class="custom-select" id="inputGroupSelect01" name="ruolo" required>
											<option value="" disabled selected>Scegli...</option>
											<option value="Funzionario">Funzionario</option>
											<option value="Impiegato semplice">Impiegato semplice</option>
											<option value="Capo settore">Capo settore</option>
										</select>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="inputGroupSelect01">Dipartimento</label>
										</div>
										<select autocomplete="off" class="custom-select" id="inputGroupSelect01" name="dipartimento" required>
											<option value="" disabled selected>Scegli...</option>
											<option value="Contabilità">Contabilità</option>
											<option value="Marketing">Marketing</option>
											<option value="Produzione">Produzione</option>
											<option value="Ricerca">Ricerca</option>
											<option value="Risorse umane">Risorse umane</option>
										</select>
									</div>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input onchange=validateForm() autocomplete="off" type="email" class="form-control-input" id="semail" name="email" required>
									<label class="label-control" for="semail">Email</label>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input autocomplete="off" type="password" class="form-control-input" id="ps" name="password" required>
									<label class="label-control" for="spassword">Password</label>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input onchange=validateForm() autocomplete="off" type="password" class="form-control-input" id="cps" name="passwordconfermata" required>
									<label class="label-control" for="spasswordconfirm">Conferma password</label>
									<div class="help-block with-errors"></div>
								</div>
								<div id="mod3">
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-submit-button">REGISTRATI</button>
								</div>
								<?php
									if (isset($_GET["status"])) {
										if ($_GET["status"]=='ko') {
											echo '<div class="form-message">
												<div id="lmsgSubmit" class="h3 text-center hidden">Registrazione fallita, riprova</div>
												</div>';
											}
										}
								?>
								<div class="form-message">
									<div id="smsgSubmit" class="h3 text-center hidden"></div>
								</div>
							</form>
						</div>
						<!-- end of form container -->
						<!-- end of sign up form -->
					</div>
					<!-- end of col -->
				</div>
				<!-- end of row -->
			</div>
			<!-- end of container -->
		</header>
		<!-- end of ex-header -->
		<!-- end of header -->
		<!-- Scripts -->
		<script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
		<script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
		<script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
		<script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
		<script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
		<script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
		<script src="../js/scripts.js"></script> <!-- Custom scripts -->
		<script src="../js/valForm.js"></script>
	</body>
</html>