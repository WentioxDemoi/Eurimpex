<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Immo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           //var_export($_POST);
           if(isset($nom) && isset($type) && isset($adresse) && isset($codepostal) && isset($ville) && isset($gps) && isset($prix)){
                //connexion à la base de donnée
                include_once "connection.php";
                //requête d'ajoutqsdfbnvqdfjkbv miqdjfb iqsb dvlijbs

                $req = mysqli_query($con , "INSERT INTO `user` (`id`, `nom`, `type`, `adresse`, `codepostal`, `ville`, `gps`, `date de création`, `prix`) VALUES (NULL, '$nom', '$type', '$adresse', '$codepostal', '$ville', '$gps', CURRENT_TIMESTAMP, '$prix')");

                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = $req;//"Employé non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn">Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
                echo $ville;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Name</label>
            <input type="text" name="nom">
            <label>Weight</label>
            <input type="text" name="type">
            <label>Price</label>
            <input type="text" name="prix">
            <label>address</label>
            <input type="text" name="adresse">
            <label>City</label>
            <input type="text" name="ville">
            <label>GPS</label>
            <input type="text" name="gps">
            <label>ZIP code</label>
            <input type="text" name="codepostal">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>