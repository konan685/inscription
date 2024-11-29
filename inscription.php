<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
    $nom= $prenom= $mdp="";
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
           $nom= test_input($_POST["nom"]);
           $prenom= test_input($_POST["prenom"]);
           $mdp= test_input($_POST["mdp"]);
    
         function test_input($data){
            $data= trim($data);
            $dara= stripslashes($data);
            $data= htmlspecialchars($data);
            return $data;
    }
}
?>
<body>
    <div class="container">
        <h2>Accueil</h2>
        <form action="#" method="POST">
            <div class="bloc1">
                <input type="radio" class="cpt" name="s'inscrire" value="créer un compte" id="compte" checked>
                <label for="compte"><div></div></label>
                <strong>Créer un compte</strong>  Nouveau sur Amazon?
            </div>
            <div class="bloc2">
                <label for="nom">Nom</label>
                <input type="text" name="nom">
            </div>
            <div class="bloc2">
               <label for="prenom">Prénom</label>
               <input type="text" name="prenom">
            </div>
            <div class="bloc2">
               <label for="mdp">Créer un mot de passe</label>
               <input type="password" name="mdp">
            </div>
            <div class="bloc5">
               <input type="submit" name="envoyer" value="Envoyer">
               <p>En créant un compte, vous accepter <a href="#">les conditions d'utilisation</a>et <a href="#">la politique de confidentialité</a>
               d'Amazon</p>
            </div>
            <div class="bloc1">
               <input type="radio" name="s'inscrire" value="se connecter" class="cpt"  id="connect" onclick="window.location.href='connexion.php'; ">
               <label for="connect"><div></div></label>
               <strong>Se connecter</strong>  déja un client?
            </div>
        </form>
    </div>
    <?php 
$host= 'localhost';
$dbname= 'INSCRIPTION';
$username= 'root';
$password= '';
try {
    //création d'une instance 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // definir le mode d'erreur pour pdo
    $pdo–>setAttribute($PDO::ATTR_ERRMODE, $PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    die("Erreur de connexion:" .$e–>getMessage());
}
        $sql="INSERT INTO utilisateurs(nom, prenom, mdp) VALUES(:nom, :prenom, :mdp)";
        $stmt= $pdo–>prepare($sql);
     try {
        $stmt–>execute([':nom' => $nom, ':prenom' => $prenom, ':mdp' => $mdp,]);
        echo "Inscription réussie";
}    catch (PDOException $e) {
        echo "Erreur";
        $e–>getMessage();
    }    
?>
</body>
</html>