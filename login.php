<?php
    session_start();
    if(isset($_SESSION["email"]))
    {
        header("Location: loggato.php");
        exit;
    }

  if (!empty($_POST["email"]) && !empty($_POST["password"]) )
    {

        $conn = mysqli_connect('localhost', 'root', '', 'Disney') or die(mysqli_error($conn));

        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $query = "SELECT * FROM users WHERE email = '".$email."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;

        if (mysqli_num_rows($res) > 0) {

            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['pass'])) {

                
                $_SESSION["user_id"] = $entry['id'];
                $_SESSION["mail"] = $entry['email'];
                $_SESSION["name"] = $entry['nome'];
                $_SESSION["surname"] = $entry['cognome'];
                header("Location: loggato.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }

        $errore = "Username e/o password errati.";
    }
    else if (isset($_POST["email"]) || isset($_POST["password"])) {

        $errore = "Inserisci username e password.";
    }

?>
<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <script src='login_db_escape.js' defer></script>
    </head>
    <body>
        
            
    <main>
            

        <div class="login">
            <div class="logo-centrato">
                      <img src="img/logobianco.png" id="Logo">
            </div>
            

            <div class="iscrizione">
            <form name='nome_form' method='post'>


                <div id="logomy">
                    <img src="img/mydisney.png" id="my">
                </div>
                
                <p id="richiesta"> Per continuare, inserisci il tuo nome utente e la tua password</p>
                <div class="dati">
                <p>
                    <label class="inserimento">E-mail<br> <input type='text' name='email' class="barra1"></label>
                </p>
                <p>
                    <label class="inserimento">Password<br> <input type='password' name='password' class="barra1"></label>
                </p>
                </div>
                <p>
                <button id="login-submit">Accedi</button>
                </p>
                <div class="register">
            <p>
                <a href='signup.php' id="registrazione" > Non hai un account? Iscriviti</a>
            </p>
        </div>
            </form>
        <div id="err">
            <?php
            if(isset($errore))
            {
                echo "<p class='errore'>";
                echo "Credenziali non valide.";
                echo "</p>";
            }
        ?>
        </div>
    
        </div>
        </div>
        </main>
    </body>
</html>

