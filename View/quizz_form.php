<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer/Modifier un Quizz</title>
</head>
<body>
    <h1><?php echo isset($quizz) ? 'Modifier' : 'Créer'; ?> un Quizz</h1>
    <form action="index.php?component=quizz_form" method="post">
        <input type="hidden" name="id" value="<?php echo isset($quizz) ? $quizz->id : ''; ?>">
        <div>
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" value="<?php echo isset($quizz) ? htmlspecialchars($quizz->title) : ''; ?>" required>
        </div>
        <div>
            <label for="published">Publié</label>
            <input type="checkbox" id="published" name="published" <?php echo isset($quizz) && $quizz->published ? 'checked' : ''; ?>>
        </div>
        <button type="submit"><?php echo isset($quizz) ? 'Modifier' : 'Créer'; ?></button>
    </form>
</body>
</html>