<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Quizz</title>
</head>
<body>
    <h1>Liste des Quizz</h1>
    <a href="index.php?component=quizz_form">Créer un nouveau Quizz</a>
    <ul>
        <?php foreach ($quizzes as $quizz): ?>
            <li>
                <?php echo htmlspecialchars($quizz->title); ?>
                <a href="index.php?component=quizz_form&id=<?php echo $quizz->id; ?>">Modifier</a>
                <a href="index.php?component=quizz_list&delete=<?php echo $quizz->id; ?>">Supprimer</a>
                <a href="index.php?component=question_list&quizz_id=<?php echo $quizz->id; ?>">Voir les questions</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>