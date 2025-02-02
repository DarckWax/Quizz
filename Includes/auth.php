<?php
session_start();
require_once 'Includes/database.php'; // Assurez-vous d'inclure la connexion à la base de données

function login($username, $password) {
    global $db; // Assurez-vous que la connexion à la base de données est accessible

    // Logique pour vérifier les identifiants de l'utilisateur
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id']; // Stocker l'ID de l'utilisateur dans la session
        header("Location: quiz_list.php"); // Rediriger vers la liste des quiz
        exit();
    } else {
        // Gérer l'échec de la connexion
        echo "Identifiants invalides.";
    }
}

function logout() {
    session_destroy();
    header("Location: login.php");
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
} 