<?php

require_once 'Model/Quizz.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizz = new Quizz();
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $quizz = Quizz::getById($_POST['id']);
    }
    $quizz->user_id = $_SESSION['user_id'];
    $quizz->title = cleanString($_POST['title']);
    $quizz->published = isset($_POST['published']) ? 1 : 0;
    $quizz->save();
    header('Location: index.php?component=quizz_list');
    exit();
}

if (isset($_GET['delete'])) {
    $quizz = Quizz::getById($_GET['delete']);
    $quizz->delete();
    header('Location: index.php?component=quizz_list');
    exit();
}

if (isset($_GET['id'])) {
    $quizz = Quizz::getById($_GET['id']);
}

$quizzes = Quizz::getAll();
require 'View/quizz_list.php';
?>