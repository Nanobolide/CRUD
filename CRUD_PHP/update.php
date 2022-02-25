<?php


error_reporting(~E_ALL);

try {
    $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=UTF8", "root", "");
}
catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

$id = $_GET['id'];

$req = $bdd->query("SELECT * FROM formulaire WHERE id = $id");
$user = $req->fetch();

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$age = htmlspecialchars($_POST['age']);

if ($_POST['submit']) {
  $req = $bdd->prepare('UPDATE formulaire SET nom=:nom, prenom=:prenom, age=:age WHERE id='.$id);
  $req->execute(compact('nom', 'prenom', 'age'));
  header('Location: home.php');
}



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
<title>Title</title>
</head>
<body>

    <div class="container mt-5">
            <div class="jumbotron">
                <h1 class="display-4 mb-4"> <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a> | Modification</h1>
                <hr class="my-4">
                <form action="" method="POST" class="w-75">
                    <div class="form-group">
                      <label for="name">Nom : </label>
                      <input type="text" class="form-control" name="nom" id="name" value="<?= $user['nom'] ?>">
                    </div>
                    <div class="form-group mb-4">
                      <label for="lastname">Prénom</label>
                      <input type="text" class="form-control" name="prenom" id="lastname" value="<?= $user['prenom'] ?>">
                    </div>
                    <div class="form-group mb-4">
                      <label for="age">Age</label>
                      <input type="text" class="form-control" name="age" id="age" value="<?= $user['age'] ?>">
                    </div>

                    <input type="submit" name="submit" value="Envoyer" class="btn btn-primary btn-block btn-lg mb-4">
                </form>
            </div>
        </div>

      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>