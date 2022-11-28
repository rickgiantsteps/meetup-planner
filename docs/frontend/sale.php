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
                    <h1>Sale dell'azienda</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
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
                <div style = "position:relative; top:-50px" class="col-lg-12">
				<h4>Sale:</h4>
                    <form onreset='setTimeout(showSale, 1)'>
                        <div class="row">
                            <div class="col">
                                <p>Filtra per dipartimento:</p>
                                <select autocomplete="off" type="text" class="form-control" onchange="showSale()" id="dip">
                                    <option value selected="">...</option>
                                    <option value="Contabilità">Contabilità</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Produzione">Produzione</option>
                                    <option value="Ricerca">Ricerca</option>
                                    <option value="Risorse umane">Risorse umane</option>
                                </select>
                            </div>
                            <div class="col">
                                <p>Filtra per<br>capienza:</p>
                                <input autocomplete="off" min="0" type="number" class="form-control" value="0" onchange="showSale()" id="cap">
                            </div>
                            <div class="col">
                                <p>Filtra per numero tavoli:</p>
                                <input autocomplete="off" min="0" type="number" class="form-control" value="0" onchange="showSale()" id="tav">
                            </div>
                            <div class="col">
                                <p>Filtra per numero lavagne:</p>
                                <input autocomplete="off" min="0" type="number" class="form-control" value="0" onchange="showSale()" id="lav">
                            </div>
                            <div class="col">
                                <p>Filtra per numero computer:</p>
                                <input autocomplete="off" min="0" type="number" class="form-control" value="0" onchange="showSale()" id="comp">
                            </div>
                            <div class="col">
                                <p>Filtra per numero proiettori:</p>
                                <input autocomplete="off" min="0" type="number" class="form-control" value="0" onchange="showSale()" id="pro">
                            </div>
							<div>
								<p><button style = "position:relative; left:-5px; top:65px" class="btn-solid-reg" type="reset">RESET</button></p>
							</div>
                        </div>
                    </form>
                    <div><p><br></p></div>
					<div class="table-responsive" id="tSale">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Dipartimento</th>
                                    <th>Capienza</th>
                                    <th>Tavoli</th>
                                    <th>Lavagne</th>
                                    <th>Computer</th>
                                    <th>Proiettori</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php require '../backend/php/querypaginasale.php';?>
                            </tbody>
                        </table>
					</div>
                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
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
	<script src="../js/ajax-sale.js"></script>
</body>
</html>