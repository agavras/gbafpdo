<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location:index.php");
}


// Connexion au serveur
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbafpdo;charset=utf8', 'root', '2421lw21PHP'); // attention un mot de passe a été défini pour l'accès à la base de données
}
// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// NEW variables issues du formulaire
$username = $_SESSION["username"];
$password = strip_tags($_POST["Password"]);
$nom = strip_tags($_POST["Nom"]);
$prenom = strip_tags($_POST["Prenom"]);
$questionValue = strip_tags($_POST["Question"]);
$reponse = strip_tags($_POST["Reponse"]);

switch($questionValue){
    case 0:
        $question = 'Dans quelle ville êtes-vous né(e) ?';
        break;
    case 1:
        $question = 'Quel est le deuxième prénom de l’aîné(e) de votre fratrie ?';
        break;
    case 2:
        $question = 'Quel est le premier concert auquel vous avez assisté ?';
        break;
    case 3:
        $question = 'Quels étaient le fabricant et le modèle de votre première voiture ?';
        break;
    case 4:
        $question = 'Dans quelle ville vos parents se sont-ils rencontrés ?';
        break;
    default:
        $question = '';
}


    // Mise a jour des infos
        $req = $bdd->prepare("UPDATE account SET password=:password, nom=:nom, prenom=:prenom, question=:question, reponse=:reponse WHERE username=:username");
        $req->execute(array(
        'password' => $password,
        'nom' => $nom,
        'prenom' => $prenom,
        'question' => $question,
        'reponse' => $reponse,
        'username' => $username
        ));
        echo"modification du compte terminé";

// boutton retour
echo"<br/><a href='index.php'>Retour</a>";

session_destroy();
?>