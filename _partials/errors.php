<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger mb-2" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <?php foreach ($success as $message): ?>
        <div class="alert alert-success mb-2" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>