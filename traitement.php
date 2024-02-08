<?php
$servername= "localhost";
$username="root";
$password="";
$dbname= "devoir_securite";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_POST['ok'])) {
    extract($_POST);
    if ($password !== $confirme) {
        echo "<script>alert('Les mots de passe ne correspondent pas. Veuillez réessayer.');</script>";
    } else {
    // Vérifier si l'e-mail existe déjà
    $checkEmailQuery = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email = :email");
    $checkEmailQuery->execute([':email' => $email]);
    $emailExists = $checkEmailQuery->fetch(PDO::FETCH_ASSOC)['count'];

    // Vérifier si le pseudo existe déjà
    $checkPseudoQuery = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE pseudo = :pseudo");
    $checkPseudoQuery->execute([':pseudo' => $pseudo]);
    $pseudoExists = $checkPseudoQuery->fetch(PDO::FETCH_ASSOC)['count'];

        if ($emailExists > 0) {
        //echo "L'e-mail existe déjà. Veuillez en choisir un autre.";
            echo "<script>alert('L'e-mail existe déjà. Veuillez en choisir un autre.');</script>";
        } elseif ($pseudoExists > 0) {
        //echo "Le pseudo existe déjà. Veuillez en choisir un autre.";
            echo "<script>alert('Le pseudo existe déjà. Veuillez en choisir un autre.');</script>";
        } else {
        // Si ni l'e-mail ni le pseudo n'existent
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insertQuery = $conn->prepare("INSERT INTO users VALUES (0, :pseudo, :nom, :prenom, :email, :password)");
            $insertQuery->execute(
                array(
                    ':pseudo' => $pseudo,
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':email' => $email,
                    ':password' => $hashedPassword
                )
            );
            //$reponse =$requete->fetch(PDO::FETCH_ASSOC);
            //var_dump($reponse);
            //echo 'Inscription réussie, bienvenue!';
            //echo "<script>alert('Inscription réussie, bienvenue!');</script>";
            header("Location: connexion.php");
            exit();
        }
    } 
} elseif (isset($_POST['reset'])) {
    $pseudo = $nom = $prenom = $email = $password = '';
    //echo 'Formulaire réinitialisé!';
}
?>
