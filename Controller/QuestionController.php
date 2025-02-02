<?php

require_once 'Model/Question.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = new Question();
    $question->quizz_id = $_POST['quizz_id'];
    $question->title = cleanString($_POST['title']);
    $question->multi = isset($_POST['multi']) ? 1 : 0;
    $question->save();
    header('Location: index.php?component=question_list&quizz_id=' . $question->quizz_id);
    exit();
}

if (isset($_GET['delete'])) {
    $question = Question::getById($_GET['delete']);
    $question->delete();
    header('Location: index.php?component=question_list&quizz_id=' . $question->quizz_id);
    exit();
}

$questions = Question::getAllByQuizzId($_GET['quizz_id']);
require 'View/question_list.php';
?>