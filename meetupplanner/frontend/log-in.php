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
		<?php require '../common/connection.php';?>
		<!-- Header -->
		<header id="header" class="ex-2-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1>Accedi</h1>
						<p>Non sei ancora iscritto? <a class="white" href="sign-up.php">Registrati</a>.</p>
						<!-- Sign Up Form -->
						<div class="form-container">
							<form id="logInForm" data-toggle="validator" data-focus="false" action="../backend/php/loginValidatore.php" method="post">
								<div class="form-group">
									<input type="email" class="form-control-input" id="lemail" name="email" required>
									<label class="label-control" for="lemail">Email</label>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<input type="password" class="form-control-input" id="lpassword" name ="password" required>
									<label class="label-control" for="lpassword">Password</label>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-submit-button">ACCEDI</button>
								</div>
								<?php
									if (isset($_GET["status"])) {
										if ($_GET["status"]=='ko') {
											echo '<div class="form-message">
												<div id="lmsgSubmit" class="h3 text-center hidden">Log-in fallito, email e/o password errata!</div>
												</div>';
											}
										}
								?>
								<div class="form-message">
									<div id="lmsgSubmit" class="h3 text-center hidden"></div>
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
	</body>
</html>