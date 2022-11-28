<?php
    if (isset($_SESSION["ruolo"])) {
        $sRuolo = $_SESSION["ruolo"];
        if (isset($_SESSION["autorizzazione"])) {
            $autorizzato = $_SESSION["autorizzazione"];
        } else {
            $autorizzato = NULL; 
        }
        if ($sRuolo==="Direttore" or (($sRuolo==="Impiegato semplice" or $sRuolo==="Funzionario" or $sRuolo==="Capo settore") and (!is_null($autorizzato) and$autorizzato<date("Y-m-d H:i:s")))) {
?>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
                <div class="container">
    
                    <!-- Text Logo - Use this if you do not have a graphic logo -->
                    <!-- <a class="navbar-brand logo-text page-scroll" href="../index.php">Tivo</a> -->
    
                    <!-- Image Logo -->
                    <a class="navbar-brand logo-text page-scroll" href="../index.php">Azienda.it</a> 
                    
                    <!-- Mobile Menu Toggle Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-awesome fas fa-bars"></span>
                        <span class="navbar-toggler-awesome fas fa-times"></span>
                    </button>
                    <!-- end of mobile menu toggle button -->
    
                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="../index.php">HOME<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="lavoratore.php">LAVORATORE</a>
                            </li>
    
                            <!-- Dropdown Menu -->          
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">RIUNIONI</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="gestioneR.php"><span class="item-text">GESTIONE RIUNIONI</span></a>
                                    <div class="dropdown-items-divide-hr"></div>
                                    <a class="dropdown-item" href="riunioni_passate.php"><span class="item-text">RIUNIONI SVOLTE</span></a>
                                    <div class="dropdown-items-divide-hr"></div>
                                    <a class="dropdown-item" href="programma.php"><span class="item-text">PROGRAMMA</span></a>
                                    <div class="dropdown-items-divide-hr"></div>
                                    <a class="dropdown-item" href="inviti.php"><span class="item-text">INVITI</span></a>
                                </div>
                            </li>
                            <!-- end of dropdown menu -->
    
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="dipartimenti.php">DIPARTIMENTI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="sale.php">SALE</a>
                            </li>
                        </ul>
                        <span class="nav-item">
                        <?php
                                if (isset($_SESSION["nome"])) {
                                    echo '<a class="btn-outline-sm" href="logout.php">LOGOUT</a>';
                                }
                                else {
                                    echo '<a class="btn-outline-sm" href="log-in.php">ACCEDI</a>';
                                }
                        ?></span>
                </div>
            </div> <!-- end of container -->
            </nav> <!-- end of navbar -->
        <!-- end of navigation -->
        <?php }
       elseif ($sRuolo==="Impiegato semplice" or $sRuolo==="Funzionario" or $sRuolo==="Capo settore") {
           ?>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
                <div class="container">
    
                    <!-- Text Logo - Use this if you do not have a graphic logo -->
                    <!-- <a class="navbar-brand logo-text page-scroll" href="../index.php">Tivo</a> -->
    
                    <!-- Image Logo -->
                    <a class="navbar-brand logo-text page-scroll" href="../index.php">Azienda.it</a> 
                    
                    <!-- Mobile Menu Toggle Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-awesome fas fa-bars"></span>
                        <span class="navbar-toggler-awesome fas fa-times"></span>
                    </button>
                    <!-- end of mobile menu toggle button -->
    
                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="../index.php">HOME<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="lavoratore.php">LAVORATORE</a>
                            </li>
    
                            <!-- Dropdown Menu -->          
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">RIUNIONI</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="inviti.php"><span class="item-text">INVITI</span></a>
                                </div>
                            </li>
                            <!-- end of dropdown menu -->
    
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="dipartimenti.php">DIPARTIMENTI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="sale.php">SALE</a>
                            </li>
                        </ul>
                        <span class="nav-item">
                            <?php
                                if (isset($_SESSION["nome"])) {
                                    echo '<a class="btn-outline-sm" href="logout.php">LOGOUT</a>';
                                }
                                else {
                                    echo '<a class="btn-outline-sm" href="log-in.php">ACCEDI</a>';
                                }
                            ?>
                        </span>
                </div>
            </div> <!-- end of container -->
            </nav> <!-- end of navbar -->
        <!-- end of navigation -->
        <?php
    } } else {
        ?>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container">

                <!-- Text Logo - Use this if you do not have a graphic logo -->
                <!-- <a class="navbar-brand logo-text page-scroll" href="../index.php">Tivo</a> -->

                <!-- Image Logo -->
                <a class="navbar-brand logo-text page-scroll" href="../index.php">Azienda.it</a> 
                
                <!-- Mobile Menu Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-awesome fas fa-bars"></span>
                    <span class="navbar-toggler-awesome fas fa-times"></span>
                </button>
                <!-- end of mobile menu toggle button -->

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="../index.php">HOME<span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="dipartimenti.php">DIPARTIMENTI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="sale.php">SALE</a>
                        </li>
                    </ul>
                    <span class="nav-item">
                        <?php
                            if (isset($_SESSION["nome"])) {
                                echo '<a class="btn-outline-sm" href="logout.php">LOGOUT</a>';
                            }
                            else {
                                echo '<a class="btn-outline-sm" href="log-in.php">ACCEDI</a>';
                            }
                    ?></span>
            </div>
        </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
    <!-- end of navigation --><?php
}
?>