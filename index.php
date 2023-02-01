<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
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
?>
