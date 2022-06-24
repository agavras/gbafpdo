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
$username = strip_tags($_POST["UserName"]);
$password = strip_tags($_POST["Password"]);
// $name = $_POST["UserName"];
// $pass = $_POST["Password"];

// Est-ce que le username existe déjà
$user = $username;
$stmt = $bdd->prepare("SELECT * FROM account WHERE username='$username' and password='$password'");
$stmt->execute([$user]); 
$user = $stmt->fetch();

// si le nom d'utilisateur existe déjà
if ($user) {
    $_SESSION["username"] = $username;
        // memorise userid
        $userid = 0;
        $stmt = $bdd->prepare("SELECT id_user FROM account WHERE username='$username'");
        $stmt->execute([$userid]); 
        $userid = $stmt->fetch();
        $_SESSION["user_id"] = $userid;
    header("location:accueil.php");
// si le nom d'utilisateur n'existe pas
} else {
    header("location:fail.php");
} 

?>