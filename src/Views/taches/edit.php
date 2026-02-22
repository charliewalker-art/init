<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une tache</title>
    <link rel="stylesheet" href="/assets/css/taches.css">
</head>
<body>
    <main class="container form-page">
        <h1>Modifier la tache</h1>

        <?php if (($_GET['error'] ?? '') === 'titre'): ?>
            <p class="error">Le titre est obligatoire.</p>
        <?php endif; ?>

        <form action="/taches/update?id=<?= (int) $tache['id'] ?>" method="POST" class="task-form">
            <label for="titre">Titre</label>
            <input id="titre" name="titre" type="text" value="<?= htmlspecialchars($tache['titre']) ?>" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5"><?= htmlspecialchars($tache['description'] ?? '') ?></textarea>

            <div class="form-actions">
                <button type="submit" class="btn">Mettre a jour</button>
                <a href="/taches">Retour</a>
            </div>
        </form>
    </main>
</body>
</html>
