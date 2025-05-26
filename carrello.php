<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "disney");

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM products WHERE user_id = '$user_id'";
$result = $conn->query($query);

$totale = 0;
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
                <a id='name' href='#' class="link"><?php echo $_SESSION['name']; ?></a>
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
            <div id='carrello'>
                    <div id='scrittacarrello'>Carrello</div>
                </div>                
            </h4>

             <div class="totale">
        Totale: € 
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $totale += $row['price'] * $row['quantity'];
            }
            echo number_format($totale, 2);
        } else {
            echo "0.00";
        }
        ?>
    </div>

        <?php if ($result->num_rows > 0): ?>  
    <div id="checkout"><div id='scrittacheckout'>Vai al check out</div></div>
<?php endif; ?>

    <div class="containerartcarrello">
        <div class="prodotti_carrello">
            <?php
            $result->data_seek(0); 
            while ($row = $result->fetch_assoc()) {
                echo '<div class="artcarrello">';
                echo '<img src="' . $row['image'] . '" alt="Prodotto">';
                echo '<p class="nome-prodotto">' . htmlspecialchars($row['nome']) . '</p>';
                echo '<p class="info-prodotto">Prezzo: €' . number_format($row['price'], 2) . '</p>';
                echo '<p class="info-prodotto" >Quantità: ' . $row['quantity'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>
</html>
           