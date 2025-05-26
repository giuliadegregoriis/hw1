<?php
session_start();


aggiungi();

function aggiungi()
{
    $userid=$_SESSION["user_id"];

     $conn = mysqli_connect('localhost', 'root', '', 'disney') ;

     $userid=mysqli_real_escape_string($conn, $userid);
     $imageprod=mysqli_real_escape_string($conn, $_POST['image']);
     $nameprod=mysqli_real_escape_string($conn, $_POST['name']);
     $priceprod=mysqli_real_escape_string($conn, $_POST['price']);

     $query="SELECT * FROM products WHERE user_id='$userid' AND nome='$nameprod'";
     $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

      if(mysqli_num_rows($res) > 0)
      {
        $row = mysqli_fetch_assoc($res);
        $new_quantita = $row['quantity'] + 1;
        $update_query = "UPDATE products SET quantity = $new_quantita WHERE id = ".$row['id'];
        mysqli_query($conn, $update_query);
      }
      else
      {
        $insert = "INSERT INTO products (user_id, image, nome, price) VALUES ('$userid', '$imageprod', '$nameprod', '$priceprod')";
        mysqli_query($conn, $insert);
      }

       mysqli_close($conn);

}


?>