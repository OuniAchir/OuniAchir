
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devoir_securite";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['token']) && hash_equals($_SESSION['token'], $_POST['token'])) {
        if (isset($_POST["ok"])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST["password"];

            if (!empty($email) && !empty($password)) {
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password'])) {
                    // Utilisateur connecté
                    echo htmlentities("Vous êtes connecté(e).");
                    exit();
                } else {
                    // Identifiants incorrects
                    echo htmlentities("Email ou mot de passe incorrect !");
                    exit();
                }
            }
        }

        if (isset($_POST["inscrire"])) {
            header("Location: inscription.php");
            exit();
        }

        if (isset($_POST['reset'])) {
            $nom = $prenom = $email = $password = '';
            //echo 'Formulaire réinitialisé!';
        }
    } else {
        die("Erreur de sécurité CSRF.");
    }
}
?>