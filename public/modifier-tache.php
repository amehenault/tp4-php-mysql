<?php
require_once __DIR__ . '/../app/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    die("Tâche introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (!empty($title)) {
        $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $id]);
        
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une tâche</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; }
        input, textarea { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background: #2196F3; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Modifier la tâche #<?= $task['id'] ?></h1>
    <form action="modifier-tache.php?id=<?= $task['id'] ?>" method="POST">
        <label>Titre *</label>
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        <label>Description</label>
        <textarea name="description" rows="4"><?= htmlspecialchars($task['description']) ?></textarea>
        <button type="submit">Mettre à jour</button>
        <a href="index.php">Annuler</a>
    </form>
</body>
</html>
