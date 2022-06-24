<?php
// debut de session
session_start();

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

// stockage des input dans une variable
$username = $_SESSION["username"];
$reponse = strip_tags($_POST["Reponse"]);

// Est-ce que le username existe déjà
$user = $username;
$stmt = $bdd->prepare("SELECT * FROM account WHERE username='$username' and reponse='$reponse'");
$stmt->execute([$user]); 
$user = $stmt->fetch();

// si le nom d'utilisateur existe déjà
if ($user) {
    header("location:accueil.php");
// si le nom d'utilisateur n'existe pas
} else {
    header("location:fail2.php");
} 

?>