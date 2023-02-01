<?php
$servername = "localhost";
$username = "username";
$password = "password";
$videogame_collection = "videogame_collection";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $videogame_collection);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupérer les données du formulaire
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Préparer la requête SQL
$sql = "INSERT INTO users (username, email, password)
VALUES ('$username', '$email', '$password')";

// Exécuter la requête SQL
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion
mysqli_close($conn);

// Récupération des données du formulaire de connexion
$username = $_POST['username'];
$password = $_POST['password'];

// Connexion à la base de données
$db = mysqli_connect('localhost', 'dbuser', 'dbpassword', 'videogame_collection');

// Requête pour récupérer les informations de l'utilisateur depuis la base de données
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($db, $query);

// Vérification des informations de l'utilisateur
if (mysqli_num_rows($result) == 1) {
  // Les informations sont valides, démarrage de la session
  session_start();
  $_SESSION['username'] = $username;
  header('Location: tableau.php');
} else {
  // Les informations sont incorrectes, retour à la page de connexion
  header('Location: login.php?error=invalid');
}

// Fermeture de la connexion à la base de données
mysqli_close($db);

?>

