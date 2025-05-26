<?php
    session_start();
    if(isset($_SESSION["nome"]))
    {
        
        header("Location: login.php");
        exit;
    }

    if (!empty($_POST["nome"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && 
        !empty($_POST["cognome"]))
    {
        $error = array();
        $conn = mysqli_connect('localhost','root','','Disney') or die(mysqli_error($conn));

        
        #EMAIL

          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }


        
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        
        if (count($error) == 0) {
             $username = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(nome, pass, email, cognome) VALUES('$username', '$password', '$email', '$cognome')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["name"] = $_POST["nome"];
                $_SESSION["id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: login.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["nome"])) {
        $error = array("Riempi tutti i campi");
    }

?>
<html>
    <head>
        <link rel='stylesheet' href='signup3.css'>
        <script src='signup2.js' defer></script>
    </head>
    <body>
        
            
    <main>
            

        <div class="login">
            <div class="logo-centrato">
                      <img src="img/logobianco.png" id="Logo">
            </div>
            

            <div class="iscrizione">
            <form name='nome_form' method='post'>

            <?php

        if(isset($error))
                {
                    foreach($error as $err) 
                    {
                        echo "<div class='errorj'><span>".$err."</span></div>";
                    }
                 } 
                 ?>


                <div id="logomy">
                    <img src="img/mydisney.png" id="my">
                </div>
                <div class="email">E-mail<br>
                    <input name="email" type="text">
                 </div>
                 <div class="password">Password<br>
                 <input  name="password" type="password">
                 </div>
                 
                 <div class="nome">Nome<br>
                    <input name="nome" type="text">
                 </div>
                 <div class="cognome">Cognome<br>
                    <input name="cognome" type="text">
                 </div>
              
                <button id="login-submit">Registrati</button>
              
                <div class="register">
    
        </div>
            </form>
        <div id="err">
        </div>
    
        </div>
        </div>
        </main>
    </body>
</html>

