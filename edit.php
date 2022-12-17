<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

         //connexion à la base de donnée
          include_once "connection.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un bien
          $req = mysqli_query($con , "SELECT * FROM user WHERE id = $id");
          $row = mysqli_fetch_assoc($req);

       if(isset($_POST['button'])){
           //extraction des informations envoyés dans des variables par la methode POST
           //verifier que tous les champs ont été remplis
           if(isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['prix']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['gps']) && isset($_POST['codepostal'])){
               //requête de modification
               $req = mysqli_query($con, "UPDATE user SET nom = '".$_POST['nom']."' , type = '".$_POST['type']."' , prix = '".$_POST['prix']."', adresse = '".$_POST['adresse']."', ville = '".$_POST['ville']."', gps = '".$_POST['gps']."', codepostal = '".$_POST['codepostal']."' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès, on fait une redirection
                    header("location: index.php");
                }else {//sinon
                    $message = "Employé non modifié";
                }

           }else {
               //sinon
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn">Retour</a>
        <h2>Modifier le bien : <?=$row['nom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>Name</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Weight</label>
            <input type="text" name="type" value="<?=$row['type']?>">
            <label>Price</label>
            <input type="text" name="prix" value="<?=$row['prix']?>">
            <label>address</label>
            <input type="text" name="adresse" value="<?=$row['adresse']?>">
            <label>City</label>
            <input type="text" name="ville" value="<?=$row['ville']?>">
            <label>GPS</label>
            <input type="text" name="gps" value="<?=$row['gps']?>">
            <label>ZIP code</label>
            <input type="text" name="codepostal" value="<?=$row['codepostal']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>