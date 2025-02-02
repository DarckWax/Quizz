<?php

require_once 'Model/Quizz.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizz = new Quizz();
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $quizz = Quizz::getById($_POST['id']);
    }
    if (isset($_SESSION['user_id'])) {
        $quizz->user_id = $_SESSION['user_id'];
    } else {
        // Handle the case where user_id is not set in the session
        die('User not logged in');
    }
    $quizz->title = cleanString($_POST['title']);
    $quizz->published = isset($_POST['published']) ? 1 : 0;
    $quizz->save();
    header('Location: index.php?component=quizz_list');
    exit();
}

if (isset($_GET['id'])) {
    $quizz = Quizz::getById($_GET['id']);
}

require 'View/quizz_form.php';
?>