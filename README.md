Ce projet est une application de gestion d'authentification utilisateur tel que :
**FICHIERS INCLUS** 
connexion.php : Ce fichier contient le formulaire de connexion utilisateur en HTML avec des fonctionnalités de vérification côté serveur en PHP. Il se connecte à une base de données MySQL pour vérifier les informations d'identification.

inscription.php : Ce fichier contient le formulaire d'inscription utilisateur en HTML avec des fonctionnalités de vérification côté serveur en PHP. Il intègre également une vérification de captcha pour prévenir les robots.

traitement.php : Ce fichier contient le traitement des données du formulaire d'inscription, y compris la vérification du captcha, la validation des données et l'insertion des données dans la base de données.

background.PNG, logo8.PNG, logo10.PNG : Ces fichiers sont des ressources d'image utilisées comme arrière-plan et logos dans les formulaires HTML.

**Instructions d'Utilisation**
Configuration de la Base de Données : Assurez-vous de créer une base de données MySQL nommée 'devoir_securite' avec une table nommée 'users'. La table users  **doit** comporter au moins les colonnes suivantes :

nom : Pour stocker le nom de l'utilisateur.
prenom : Pour stocker le prénom de l'utilisateur.
email : Pour stocker l'adresse e-mail de l'utilisateur.
password : Pour stocker le mot de passe haché de l'utilisateur.

Assurez-vous que la structure de la table et les noms de colonnes correspondent à ceux utilisés dans le code PHP pour assurer un fonctionnement correct de l'application.

Configuration de la Connexion à la Base de Données : Dans les fichiers PHP (connexion.php, inscription.php, traitement.php), ajustez les paramètres de connexion à la base de données pour correspondre à votre configuration. Cela inclut les variables suivantes :

$servername : L'adresse du serveur MySQL (par exemple, "localhost").
$username : Le nom d'utilisateur de la base de données MySQL (par défaut, "root").
$password : Le mot de passe de la base de données MySQL (par défaut, vide).
$dbname : Le nom de la base de données MySQL (dans ce cas, "devoir_securite").
Assurez-vous que ces informations sont correctes pour que les fichiers PHP puissent se connecter à la base de données avec succès.

Exécution du Projet : Après avoir configuré correctement la base de données et la connexion, placez les fichiers dans un serveur web compatible PHP (comme Apache) et ouvrez-les dans un navigateur web.

**Boutons**
Bouton "Se connecter" : Sur la page connexion.php, le bouton "Se connecter" permet à l'utilisateur de soumettre ses informations d'identification (email et mot de passe) pour se connecter. Les données sont ensuite vérifiées côté serveur en PHP pour authentifier l'utilisateur.

Bouton "Ajouter un compte" : Le bouton "Ajouter un compte" sur la page connexion.php redirige l'utilisateur vers la page inscription.php, où il peut s'inscrire pour créer un nouveau compte utilisateur.

Bouton "S'inscrire" : Sur la page inscription.php, le bouton "S'inscrire" permet à l'utilisateur de soumettre le formulaire d'inscription. Les données sont vérifiées côté serveur en PHP, y compris la validation du captcha, avant d'être insérées dans la base de données.

Bouton "Réinitialiser" : Le bouton "Réinitialiser" sur les pages connexion.php et inscription.php réinitialise tous les champs du formulaire, permettant à l'utilisateur de recommencer le processus si nécessaire.



