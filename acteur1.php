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

// recupere variable du nouveau commentaire pour l'ajouter en bdd
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Message'])) {
    $message = strip_tags($_POST["Message"]);
    $username = $_SESSION["username"];

    if ($message != "") {
        $userid = $_SESSION["user_id"];
        $req = $bdd->prepare('INSERT INTO post (id_acteur, id_user, post) VALUES(?,?,?)');
        $req->execute(array("1", $userid[0], $message));
    } 
}

$sth = $bdd->prepare("SELECT description FROM acteur where id_acteur=1");
$sth->execute();
$desc1 = $sth->fetch();
// print_r($desc1[0]);
    $sth = $bdd->prepare("SELECT logo FROM acteur where id_acteur=1");
    $sth->execute();
    $img1 = $sth->fetch();
    // print_r($img1[0]);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>EcfGBAF</title>
</head>

<body>

    <!-- header de la page ////////////////////////////////-->
    <header>
        <div id="cadreLogoGBAF">
            <a href="./accueil.php">
                <img src="./assets/img/gbaf.webp" alt="logo gbaf">
            </a>
        </div>
        <div id="cadreIdUtilisateur">
            <a href="./parametresDuCompte.php">
                <img src="./assets/img/user.webp" alt="icon utilisateur">
            </a>
            <p><?php echo $_SESSION["username"]; ?></p>
            <a href="./logout.php">
                <button>x</button>
            </a>
        </div>
    </header>

    <!-- section présentation ACTEUR //////////////////////-->
    <section id="presentationActeur">
        <?php echo '<img src="./assets/img/'.$img1[0].'" alt="logo partenaire">' ?>
        <h3><?php echo $desc1[0] ?></h3>
    </section>

    <!-- section acteurs //////////////////////////////////-->
    <section id="commentairesActeur">
        <div id="div1Commentaires">
            <form action="acteur1.php" method="post">
                <h2>x commentaires</h2>
                <!-- <button id="btnNouveauCommentaire">Nouveau commentaires</button> -->
                <input type="submit" name="AjoutCommentaire" value="Nouveau commentaires" />
                <h2>x likes</h2>
                <!-- <button id="btnLike">L</button> -->
                <input type="submit" name="VoteActionL" value="L" />

                <!-- <button id="btnDislike">D</button> -->
                <input type="submit" name="VoteActionD" value="D" />
            </form>
        </div>

        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['AjoutCommentaire'])) {
        AjoutCommentaire();
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['VoteActionL'])) {
        myVote("like");
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['VoteActionD'])) {
        myVote("dislike");
        }

        function myVote($voteLD)
        {
            $userid = $_SESSION["user_id"];
            $bdd = new PDO('mysql:host=localhost;dbname=gbafpdo;charset=utf8', 'root', '2421lw21PHP');
            $sth = $bdd->prepare("SELECT vote FROM vote where id_acteur=1 and id_user='$userid[0]' ");
            $sth->execute();
            $vote = $sth->fetch();
            // print_r($vote[0]);
            if ($vote) {
                echo 'Vous avez deja voté !';
            } else {
                // ajoute un vote en bdd selon le boutton L ou D
                if ($voteLD != "") {
                $req = $bdd->prepare('INSERT INTO vote (id_acteur, id_user, vote) VALUES(?,?,?)');
                $req->execute(array("1", $userid[0], $voteLD));
                echo"Votre vote est enregistré (". $voteLD .")";
                }     
            }
        }

        function AjoutCommentaire() {
            header("location:entrerMessage.php");
        }
        ?>


        <div id="commentairesPHP">
            <?php
            // recupere le nombre de messages
            $sth = $bdd->prepare("SELECT COUNT(id_post) FROM post where id_acteur=1");
            $sth->execute();
            $nbr = $sth->fetch();
            // var_dump($nbr[0]);

            // selectionne chaque ligne
            $sth = $bdd->prepare("SELECT * FROM post where id_acteur=1");
            $sth->execute();

            // affiche les infos
            for ($i = 1; $i <= $nbr[0]; $i++) {
            $post = $sth->fetch();
            // print_r($post[0]);
            // echo $post[0]; // Date
            // echo $post[1]; // id_acteur
            // echo $post[2]; // id_post
            // echo $post[3]; // id_user
            // echo $post[4]; // post

            $sth1 = $bdd->prepare("SELECT prenom FROM account where id_user=$post[3]");
            $sth1->execute();
            $prenom = $sth1->fetch();
            echo $prenom[0] . " le " . $post[0];
            echo "<br/>";
            echo $post[4];
            echo "<br/>";
            echo "..........";
            echo "<br/>";
            }
            ?>

            <p>Texte Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi voluptates neque rem
                exercitationem vitae suscipit reiciendis aliquid, laudantium culpa repellat libero ea natus consequatur
                sit dolores modi repudiandae quasi delectus!</p>
        </div>

    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>