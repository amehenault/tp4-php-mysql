<?php
require_once __DIR__ . '/../app/db.php';

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { display: inline-block; padding: 8px 12px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        .btn-edit { color: blue; margin-right: 10px; }
        .btn-delete { color: red; }
    </style>
</head>
<body>

    <h1>Ma Liste de Tâches</h1>
    
    <a href="ajouter-tache.php" class="btn">+ Ajouter une tâche</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['id'] ?></td>
                    <td><strong><?= htmlspecialchars($task['title']) ?></strong></td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                    <td>
                        <a href="modifier-tache.php?id=<?= $task['id'] ?>" class="btn-edit">Modifier</a>
                        <a href="supprimer-tache.php?id=<?= $task['id'] ?>" class="btn-delete" onclick="return confirm('Supprimer ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>

