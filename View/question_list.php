<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Questions</title>
</head>
<body>
    <h1>Liste des Questions</h1>
    <a href="index.php?component=question_form&quizz_id=<?php echo $_GET['quizz_id']; ?>">Créer une nouvelle Question</a>
    <ul>
        <?php foreach ($questions as $question): ?>
            <li>
                <?php echo htmlspecialchars($question->title); ?>
                <a href="index.php?component=question_form&id=<?php echo $question->id; ?>&quizz_id=<?php echo $question->quizz_id; ?>">Modifier</a>
                <a href="index.php?component=question_list&delete=<?php echo $question->id; ?>&quizz_id=<?php echo $question->quizz_id; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>