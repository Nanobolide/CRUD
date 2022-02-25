<?php 

try {

    $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=UTF8", "root", ""); 
} catch (Exception $e) {
    die('Erreur :'.$e->getMessage());
}

$req = $bdd->query('SELECT * FROM formulaire');
$users = $req->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>CRUD</title>
</head>
<body>

    <a href="add.php" class="btn btn-success btn-lg btn-block w-50 mt-5 mx-5">
         <i class="fa fa-plus-circle" aria-hidden="true"></i> 
         Ajouter une nouvelle personne
    </a>

    <div class="container-fluid mt-5">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Informations</h1>
            <hr class="my-4">
            <table class="table table-dark table-striped">
                <tr>
                    <td>id</td>
                    <td>Nom</td>
                    <td>Prénoms</td>
                    <td>Age</td>
                    <td>ville</td>
                    <td>Email</td>
                    <td>Adresse</td>
                    <td>Action</td>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?=$user['id'] ?></td>
                    <td><?= $user['nom'] ?></td>
                    <td><?= $user['prenom'] ?></td>
                    <td><?= $user['age'] ?></td>
                    <td><?= $user['ville'] ?></td>
                    <td><?= $user['Email'] ?></td>
                    <td><?= $user['Adresse'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $user['id'] ?>" onclick="return confirm('Voulez vous modifier cette donnée')" class="btn btn-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> Modifier</a>
                        <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Voulez vous supprimer cette donnée')"
                            class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true">Supprimer</i> </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>