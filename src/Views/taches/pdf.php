<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des taches</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            font-size: 12px;
        }
        h1 {
            font-size: 18px;
            margin: 0 0 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            vertical-align: top;
            text-align: left;
        }
        th {
            background: #f3f4f6;
        }
        .empty {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Liste des taches</h1>

    <?php if (empty($taches)): ?>
        <p class="empty">Aucune tache disponible.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 25%;">Titre</th>
                    <th>Description</th>
                    <th style="width: 24%;">Cree le</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taches as $tache): ?>
                    <tr>
                        <td><?= (int) $tache['id'] ?></td>
                        <td><?= htmlspecialchars($tache['titre']) ?></td>
                        <td><?= nl2br(htmlspecialchars($tache['description'] ?? '')) ?></td>
                        <td><?= htmlspecialchars($tache['created_at'] ?? '-') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
