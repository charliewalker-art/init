<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail d'une tache</title>
    <link rel="stylesheet" href="/assets/css/taches.css">
</head>
<body>
    <main class="container detail-page">
        <h1><?= htmlspecialchars($tache['titre']) ?></h1>
        <p class="task-desc"><?= nl2br(htmlspecialchars($tache['description'] ?? '')) ?></p>
        <p class="meta">Creee le: <?= htmlspecialchars($tache['created_at'] ?? '-') ?></p>

        <div class="form-actions">
            <a class="btn" href="/taches/edit?id=<?= (int) $tache['id'] ?>">Modifier</a>
            <a href="/taches">Retour liste</a>
        </div>
    </main>
</body>
</html>
