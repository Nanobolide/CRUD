
<?php

//Sauvegarder dans une base de donnée

 
  if(isset($_POST['Enregistrer']))
   {
    try {
      $bddPDO = new PDO('mysql:host=localhost;dbname=espace_membre','root','');
    } catch (Exception $e) {
        die('Erreur : ' .$e->getMessage());
    }

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['adresse'])) 
    {
      
      $requete = $bddPDO->prepare('INSERT INTO formulaire (nom,prenom,age,ville,email,adresse) VALUES(:nom,:prenom,:age,:ville, :email, :adresse)');


      $result  =  $requete->execute(
        array(
          'nom' =>  htmlspecialchars($_POST['nom']),
          'prenom' => htmlspecialchars($_POST['prenom']),
          'age' => htmlspecialchars($_POST['age']),
        'ville' => htmlspecialchars($_POST['ville']),
        'email' => htmlspecialchars($_POST['email']),
        'adresse' => htmlspecialchars($_POST['adresse']),
          )
        );

      }

    }
    




   
?>