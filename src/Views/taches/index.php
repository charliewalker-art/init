<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des taches</title>
    <link rel="stylesheet" href="/assets/css/taches.css">
</head>
<body>
    <main class="container">
        <div class="header-row">
            <h1>Mes taches</h1>
            <div class="actions">
                <a class="btn" href="/taches/pdf">Generer PDF</a>
                <a class="btn" href="/taches/create">Ajouter une tache</a>
            </div>
        </div>

        <?php if (empty($taches)): ?>
            <p>Aucune tache pour le moment.</p>
        <?php else: ?>
            <ul class="task-list">
                <?php foreach ($taches as $tache): ?>
                    <li class="task-item">
                        <div>
                            <h2><?= htmlspecialchars($tache['titre']) ?></h2>
                            <p><?= nl2br(htmlspecialchars($tache['description'] ?? '')) ?></p>
                        </div>
                        <div class="actions">
                            <a href="/taches/show?id=<?= (int) $tache['id'] ?>">Afficher</a>
                            <a href="/taches/edit?id=<?= (int) $tache['id'] ?>">Modifier</a>
                            <form action="/taches/delete?id=<?= (int) $tache['id'] ?>" method="POST">
                                <button type="submit" class="btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
</body>
</html>
