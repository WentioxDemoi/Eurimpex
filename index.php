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
    <div class="container">
        <a href="add.php" class="Btn_add"> Create</a>
        <h4> Products List </h4>
        
        <table>
            <tr id="items">
                <th>Created at</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Action</th>
                
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connection.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM user");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas de bien dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de bien immobilier ajouté !" ;
                    
                }else {
                    //sinon , affichons la liste de tous les biens
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['date de création']?></td>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['type']?></td>
                            <td><?=$row['prix']?></td>
                            <td><a href="edit.php?id=<?=$row['id']?>" class="Btn_edit">Edit</a></td>
                            <td><a href="view.php?id=<?=$row['id']?>" class="Btn_show">Show</a></td>
                            <td><a href="delete.php?id=<?=$row['id']?>" class="Btn_delete">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
</body>
</html>