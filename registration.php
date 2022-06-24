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

// variables issues du formulaire
$username = strip_tags($_POST["UserName"]);
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

// Est-ce que le username existe déjà
$user = $username;
$stmt = $bdd->prepare("SELECT * FROM account WHERE username=?");
$stmt->execute([$user]); 
$user = $stmt->fetch();

// si le nom d'utilisateur existe déjà
if ($user) {
    echo"le nom d'utilisateur existe déjà";
// si le nom d'utilisateur n'existe pas encore on ajoute l'utilisateur
} else {
        $req = $bdd->prepare('INSERT INTO account (username, password, nom, prenom, question, reponse) VALUES(?,?,?,?,?,?)');
        $req->execute(array($username, $password, $nom, $prenom, $question, $reponse));
        echo"enregistrement du compte terminé";
} 

// boutton retour
echo"<br/><a href='index.php'>Retour</a>";
?>