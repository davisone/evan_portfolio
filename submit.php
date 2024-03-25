<?php
// Paramètres de connexion à la base de données MySQL
$servername = "localhost"; // Adresse du serveur MySQL
$username = ""; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "portfolio"; // Nom de la base de données

// Connexion à la base de données MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['comment'];

    // Requête SQL d'insertion des données dans la table de la base de données
    $sql = "INSERT INTO votre_table (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Exécution de la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des données dans la base de données : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
