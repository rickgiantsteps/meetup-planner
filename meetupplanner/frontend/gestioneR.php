<?php
	// Start the session
	session_start();
	
	if (!isset($_SESSION["nome"])) {
		header('Location: log-in.php');
   } elseif (!isset($_SESSION["autorizzazione"]) && $_SESSION["ruolo"] != 'Direttore') {
      header('Location: lavoratore.php');
   }

   $tomorrow = date("Y-m-d", strtotime('tomorrow'));
  
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
                  <h1>Gestisci o crea le tue riunioni</h1>
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
                if (isset($_GET["status"]) && $_GET["status"] == 'warning') {
                  echo '<div style = "position:relative; top:-50px" class="alert alert-warning" role="alert">
                     <i class="fas fa-exclamation-triangle"></i>
                     La sala della riunione è piena!
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
						Successo!
					</div>'; }
				?>
				<div class="row tabs" style = "position:relative; top:-50px">
               <div class="col-lg-12" style = "position:relative; left:0px; top:-110px">
                  <div class="row px-3 mt-3 justify-content-center"> <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">CREA RIUNIONE</a> </div>
                  <h4><u>Tutte</u> le riunioni:</i></i></h4>
                  <form onreset='setTimeout(showRiunioni, 1)' style = "position:relative; left:0px; top: 5px">
                     <div class="row">
                        <div class="col">
                           <p>Dipartimento:</p>
                           <select onchange="showRiunioni()" class="form-control" id="dip">
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
                           <input onchange="showRiunioni()" id="anno" autocomplete="off" class="form-control" type="number" min= "<?php echo date("Y")?>" step="1" value="">
                        </div>
                        <div class="col">
                           <p>Filtra per mese:</p>
                           <input onchange="showRiunioni()" id="mese" autocomplete="off" type="month" min="<?php echo date('Y')?>-<?php echo date('m')?>" class="form-control" placeholder="...">
                        </div>
                        <div class="col">
                           <p>Filtra per settimana:</p>
                           <input onchange="showRiunioni()" id="settimana" autocomplete="off" min="<?php echo date('Y')?>-W<?php echo date('W')?>" type="week" class="form-control" placeholder="...">
                           </div>
                        <div class="col">
                           <p>Filtra per giorno:</p>
                           <input onchange="showRiunioni()" id="giorno" min="<?php echo date("Y-m-d")?>" autocomplete="off" type="date" class="form-control" placeholder="...">
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
                              <th style="overflow: auto" class="text-center">Azioni</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php require "../backend/php/querypaginagestioneR.php"; ?>
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
      <!-- Details Lightbox 1 -->
      <div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h3>Crea riunione:</h3>
                  <hr>
                  <form id="newriunioneForm" onreset='setTimeout(showSaleDisp, 1)' action="../backend/php/creaNuovaRiunione.php" method="post">
                     <p>Inserisci la data ed ora:</p>
                     <input autocomplete="off" class="form-control input-sm" id="data" type="date" name="data" onchange="showSaleDisp('saleS')" required>
                     <input autocomplete="off" min="08:00" max="19:00" class="form-control input-sm" id="ora" type="time" name="ora" onchange="showSaleDisp('saleS')" required>
                     <p> </p>
                     <hr>
                     <p>Inserisci la durata (in minuti):</p>
                     <input autocomplete="off" min="0" class="form-control input-sm" id="durata" type="number" name="durata" onchange="showSaleDisp('saleS')" required>
                  </div>
                  <!-- end of col -->
                     <div class="col-lg-8">
                     <p><br><u>Altre impostazioni:</u><br></p>
                     <p>Inserisci il dipartimento e la sala disponibile all'orario scelto:</p>
                     <select autocomplete="off" class="custom-select input-sm" id="dip" name="dipartimento" onchange="showSaleDisp('saleS')" required>
                     <option value="" disabled selected>Dipartimenti...</option>
                     <option value="Contabilità">Contabilità</option>
                     <option value="Marketing">Marketing</option>
                     <option value="Produzione">Produzione</option>
                     <option value="Ricerca">Ricerca</option>
                     <option value="Risorse umane">Risorse umane</option>
                     </select>
                        <div id="saleS">
                              <select autocomplete="off" class="custom-select input-sm" id="salaDisp" name="sala" required>
                              <option value="" disabled selected>Sale: inserisci tutti i campi precedenti!</option>
                              </select>
                        </div>
                     <div style="position:relative; top:30px">    
                     <p>Inserisci il tema della riunione:</p>    
                     <textarea maxlength="50" autocomplete="off" class="form-control" id="exampleFormControlTextarea1" rows="1" name="tema" required></textarea>
                     </div>
                     <div style="text-align: center;">
                     <a class="btn-outline-reg mfp-close as-button" style="position:relative; top:25px" href="#screenshots">INDIETRO</a> <button class="btn-solid-reg" style="position:relative; top:25px" type="reset" onclick="cancellaSale('saleS')" value="modifica"><i>CANCELLA</i></button> <button style="position:relative; top:25px" class="btn-solid-reg" type="submit"><u>CREA</u></button>
                  </form>
               </div>
               </div> <!-- end of col -->
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
                  <h3>Invita lavoratori:</h3>
                  <hr>
                  <form action="../backend/php/assegnaInvito.php" method="post">
                     <div class="row">
                        <div class="col" id="fRuolo">
                           <p>Filtra per ruolo:</p>
							<select autocomplete="off" type="text" class="form-control" placeholder="..." id="ruoloU" name="ruoloU">
								<option value="" selected>...</option>
								<option value="Funzionario">Funzionario</option>
								<option value="Impiegato semplice">Impiegato semplice</option>
								<option value="Capo settore">Capo settore</option>
								<option value="Direttore">Direttore</option>
							</select>
                        </div>
                        <div class="col" id="mostraInvitabili">
                           <p><br>Aggiungi invitati (a cui non è già stato mandato un invito per questa riunione):</p>
                           <select autocomplete="off" type="text" class="form-control" placeholder="...">
                              <option disabled>...</option>
                           </select>
                           <button style="position:relative; top:10px" class="btn-solid-reg" type="submit"><u>INVITA</u></button>
               </form>
                        </div>
                     </div>
               </div>
               <!-- end of col -->
               
			   <div class="col" id="infoR">
               </div> <!-- end of col -->
			   
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <!-- Details Lightbox 3 -->
      <div id="details-lightbox-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
               </div>
               <h5>Riepilogo:</h5>
               <div class="col-lg-4">
					<div id="infoRMod">
					</div>
               </div>
               </div>

					
               <div class="row">
               <div class="col-lg-4">
                  <h3>Modifica riunione:</h3>
                  <hr>
				  
					
                  <form id="modRiunioneForm" onreset='setTimeout(showSaleDisp, 1)' action="../backend/php/modificariunione.php" method="post">
                     <p>Inserisci la data ed ora:</p>
                     
                     <input autocomplete="off" class="form-control input-sm" id="data2" type="date" min="<?php echo $tomorrow?>" name="data1" onchange="showSaleDisp2('saleS2')" required>
                     <input autocomplete="off" min="08:00" max="19:00" class="form-control input-sm" id="ora2" type="time" name="ora1" onchange="showSaleDisp2('saleS2')" required>
                     <p> </p>
                     <hr>
                     <p>Inserisci la durata (in minuti):</p>
                     <input autocomplete="off" min="0" class="form-control input-sm" id="durata2" type="number" name="durata1" onchange="showSaleDisp2('saleS2')" required>
                  </div>
                  <!-- end of col -->
                     <div class="col-lg-8">
                     <p><br><u>Altre impostazioni:</u><br></p>
                     <p>Inserisci il dipartimento e la sala disponibile all'orario scelto:</p>
                     <select autocomplete="off" class="custom-select input-sm" id="dip2" name="dipartimento1" onchange="showSaleDisp2('saleS2')" required>
                     <option value="" disabled selected>Dipartimenti...</option>
                     <option value="Contabilità">Contabilità</option>
                     <option value="Marketing">Marketing</option>
                     <option value="Produzione">Produzione</option>
                     <option value="Ricerca">Ricerca</option>
                     <option value="Risorse umane">Risorse umane</option>
                     </select>
                        <div id="saleS2">
                              <select autocomplete="off" class="custom-select input-sm" id="salaDisp2" name="sala1" required>
                              <option value="" disabled selected>Sale: inserisci tutti i campi precedenti!</option>
                              </select>
                        </div>
                     <div style="position:relative; top:30px">    
                     <p>Inserisci il tema della riunione:</p>    
                     <textarea maxlength="50" autocomplete="off" class="form-control" id="exampleFormControlTextarea1" rows="1" name="tema1" required></textarea>
                     </div>
                     <div style="text-align: center;">
                     <a class="btn-outline-reg mfp-close as-button" style="position:relative; top:25px" href="#screenshots">INDIETRO</a> <button class="btn-solid-reg" style="position:relative; top:25px" type="reset" onclick="cancellaSale('saleS2')" value="canc"><i>CANCELLA</i></button> <button style="position:relative; top:25px" class="btn-solid-reg" type="submit"><u>MODIFICA</u></button>
                  </form>
               </div>
               </div> <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <!-- Details Lightbox 4 -->
      <div id="details-lightbox-4" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h3>Elimina riunione:</h3>
                  <hr>
                  <h5>Riepilogo:</h5>
                  <div id="deleteriunione">
                  </div>
               </div>
               <!-- end of col -->
               <div class="col-lg-8 justify-content-center">
                  <h4>
					<form action="../backend/php/eliminaRiunione.php" method="post">
						<br><br>Vuoi davvero eliminare la riunione?</h3>
						<a class="btn-outline-reg mfp-close as-button" href="#screenshots">INDIETRO</a> <button class="btn-solid-reg" href="#screenshots" type="submit">ELIMINA</button>
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
	  <script src="../js/ajax-saleDisp.js"></script>
	  <script src="../js/ajax-saleDisp2.js"></script>
	  <script src="../js/cancellaSale.js"></script>
	  <script src="../js/inviaSala.js"></script>
	  <script src="../js/inviaSala2.js"></script>
	  <script src="../js/passaParametri.js"></script>
	  <script src="../js/mostraInvitabili.js"></script>
	  <script src="../js/inviaId.js"></script>
     <script src="../js/ajax-modificariunione.js"></script>
     <script src="../js/datiriunionedaeliminare.js"></script>
     <script src="../js/ajax-eliminariunione.js"></script>
     <script src="../js/mindatafutura.js"></script>
     <script src="../js/ajax-filtroriunioni.js"></script>
   </body>
</html>