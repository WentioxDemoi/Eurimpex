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


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           //verifier que tous les champs ont été remplis
           if(isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['prix']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['gps']) && isset($_POST['codepostal'])){
               //requête de modification
               $req = mysqli_query($con, "UPDATE user SET nom = '".$_POST['nom']."' , type = '".$_POST['type']."' , prix = '".$_POST['prix']."', adresse = '".$_POST['adresse']."', ville = '".$_POST['ville']."', gps = '".$_POST['gps']."', codepostal = '".$_POST['codepostal']."' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
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
        <h2>Informations about the client : <?=$row['nom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <td>
            <h4>Name : </h4>
            <h4 >    <?=$row['nom']?></h4><br>
            <h4>Weight : </h4>
            <h4>    <?=$row['type']?></h4><br>
            <h4>Price : </h4>
            <h4>    <?=$row['prix']?></h4><br>
            <h4>address : </h4>
            <h4>    <?=$row['adresse']?></h4><br>
            <h4>City : </h4>
            <h4>    <?=$row['ville']?></h4><br>
            <h4>GPS : </h4>
            <h4>    <?=$row['gps']?></h4><br>
            <h4>ZIP code : </h4>
            <h4>    <?=$row['codepostal']?></h4><br>
            </td>
    </div>
</body>
</html>