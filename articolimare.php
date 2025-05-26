<?php
    session_start();
    if(isset($_SESSION["nome"]))
    {

        header("Location: loggato.php");
        exit;
    }
  ?>

<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport"
    content="width=device-width, initial-scale=1">

        <title> Disney Store IT | Negozio Online</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="articolimare2.css">
        <script src="mhw3.js" defer></script>

        

        </head>


            
              
           <header class="Intestazione">
        <div class="head">
            <a href="loggato.php">  
                <div class="logo-centrato">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Disney_Store_2024_logo.svg/2560px-Disney_Store_2024_logo.svg.png" id="Logo">
                    </div>
                </a>


                <div class="operazionimobile">
                    <a href="#">
                <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
              </div>
              </a>
                </div>
                
    
                <div class="operazioni">
                <div class="opleft">
                <a href="https://www.disneyplus.com/it-it" class="op">Disney+</a>
                <img src="img/puntino.png" class="puntino">

                <a href="https://www.disney.it/" class="op">Disney.it</a>
                <img src="img/puntino.png" class="puntino">

                <a href="https://support.disneystore.it/hc/it" class="op">Servizio Clienti</a>
                <img src="img/puntino.png" class="puntino">

                <a href="https://www.disneystore.it/cerca-ordini" class="op">Ordini</a>
                </div>

                
                <div class="opright">
                    <div class="menu">
                <a href="area_personale.php" class="icon">        
                <img src="img/account.png" class="icona"></a>
                <a id='user' href='area_personale.php' class="link">Ciao <?php echo $_SESSION['name']; ?>!</a>
                    </div>
                    <div class="menu">
                        <a href="#" class="icon"> 
                <img src="img/cuore.png" class="icona"></a>
                <a href="https://www.disneystore.it/lista-dei-desideri" class="link">La mia Lista dei Desideri</a>
                    </div>
                    <div class="menu">
                        <a href="carrello.php" class="icon"> 
                <img src="img/shopping bag.png" class="icona"></a>
                <a href="carrello.php" class="link">Carrello</a>
                </div>
                </div>
</div>

           

            <div class="barra">
                <nav class="categorie">
                    <div class="cat">
                    <a href="#" class="opzioni">NOVITÀ</a>
                    </div>
                    <span class="divisore"></span>
                    <div class="cat">
                    <a href="#" class="opzioni">COLLEZIONE ESTATE</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">GIOCHI E COSTUMI</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">MODA</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">CASA</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">COLLEZIONABILI</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">IDEE REGALO</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">PERSONAGGI</a>
                    </div>
                    <div class="cat">
                    <a href="#" class="opzioni">OFFERTE E SALDI</a>
                    </div>

                </nav>
                <nav class="cerca">
                    <a href="#" class="categorie">CERCA
                       
                    </a>
                     <img src="img/lente.png" class="icona">
                </nav>

            </div>

            </header>
            <body>
                
            <h4>    
            <div id='articolidamare'>
                    <div id='artscritta1'>Articoli da Mare: Costumi, Accessori e Teli per l’Estate</div>
                    <div id='artscritta2'>Scopri la collezione estiva con i migliori articoli da mare: costumi, accessori, abbigliamento estivo e teli mare per vivere al<br>meglio ogni giornata in spiaggia!</div>
                </div>                
            </h4>

            <div class="prodotti_primopiano">
            <div class="prodotti_primopiano1">
             
             <div class="art">
                <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>
                <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/abitobimba1.png" class="immagineprod"> 
                    <div class="scrittaprod">Abito bimba Principesse Disney</div> 
                    <div class="scrittaprod2">28.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
                </a>
            </div>

            <div class="art">
            <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>
            <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/borsacenerentola1.png" class="immagineprod"> 
                    <div class="scrittaprod">Borsa da spiaggia Cenerentola</div> 
                    <div class="scrittaprod2">20.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
                </a>
            </div> 

            <div class="art">
            <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>
            <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/telostitch1.png" class="immagineprod"> 
                    <div class="scrittaprod">Telo mare Stitch,Lilo e Stitch</div> 
                    <div class="scrittaprod2">16.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
                </a>
            </div>


            <div class="art">
            <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>
            <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/costumesirenetta1.png" class="immagineprod"> 
                    <div class="scrittaprod">Costume da bagno deluxe La Sirenetta per bimbi</div> 
                    <div class="scrittaprod2">36.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
            </a>
            </div>
</div>

            <div class="prodotti_primopiano2">
            <div class="art">
            <div class="cuoreprod"><a href="#"><img src="img/cuore2.png" class="like"></a></div>
            <a href="#" class="articolo" a href="login.php">
                    <div class="containerart">
                    <img src="img/occhialisole1.png" class="immagineprod"> 
                    <div class="scrittaprod">Occhiali da sole bimbi La Sirenetta<br></div> 
                    <div class="scrittaprod2">12.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="#"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
                
            </a>
            </div> 
            
            <div class="art">
            <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>
            <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/zainopiscina1.png" class="immagineprod"> 
                    <div class="scrittaprod">Zaino da piscina Cars</div> 
                    <div class="scrittaprod2">20.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
            </a>
            </div> 
            
            <div class="art">
            <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>
            <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/borsaspiaggia1.png" class="immagineprod"> 
                    <div class="scrittaprod">Borsa a spalla da spiaggia La Sirenetta</div> 
                    <div class="scrittaprod2">20.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
                
            </a>
            </div> 
            
            <div class="art">
            <div class="cuoreprod"><a href="login.php"><img src="img/cuore2.png" class="like"></a></div>

            <a href="#" class="articolo">
                    <div class="containerart">
                    <img src="img/infradito1.png" class="immagineprod"> 
                    <div class="scrittaprod">Infradito bimbi Minni<br></div> 
                    <div class="scrittaprod2">12.00€</div> 
                    </div>
                    <div class="scrittaart"><a href="login.php"><div class="acquistorapido">Aggiungi al carrello</div></a></div>
            </a>
            </div> 
        </div>
</div>

        
  
        <footer class="footer">
            <div class="footer-left">
              <div class="newsletter">
                <div class="news">
                  Iscriviti per ricevere comunicazioni via e-mail sulle nostre novità<br>
                  e offerte speciali.
                </div>
                <div class="iscrizione-foto">
                  <a href="#" class="linkiscrizione">
                    <div class="iscriviti-box">Iscriviti ora</div>
                  </a>
                  <a href="#" class="linkfoto">
                    <div class="fotolink">@DisneyStoreIT<br>Tutte le Foto</div>
                  </a>
                </div>
              </div>
            </div>
          
            <div class="separator"></div>
          
            <div class="footer-right">
              <div class="linkfooter">
                <a href="#" class="vari">Servizio Clienti</a> |
                <a href="#" class="vari">Termini d'Uso</a> |
                <a href="#" class="vari">Trova Negozio</a> |
                <a href="#" class="vari">Mappa del Sito</a> |<br>
                <a href="#" class="vari">Normativa Europea sul trattamento dei dati personali</a> |
                <a href="#" class="vari">Informativa sulla Privacy</a> |
                <a href="#" class="vari">Politica dei Cookie</a> |<br>
                <a href="#" class="vari">Informativa sulla Privacy UE</a> |
                <a href="#" class="vari">Termini e Condizioni generali</a> |
                <a href="#" class="vari">Gestisci le impostazioni dei Cookies</a> |
                <a href="#" class="vari">s172 Statements</a>
              </div>
            </div>
          </footer>
</body>