<?php

require_once 'Model/Quizz.php';

if (isset($_GET['delete'])) {
    $quizz = Quizz::getById($_GET['delete']);
    $quizz->delete();
    header('Location: index.php?component=quizz_list');
    exit();
}

$quizzes = Quizz::getAll();
require 'View/quizz_list.php';
?>