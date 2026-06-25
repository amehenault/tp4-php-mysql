<?php
require_once __DIR__ . '/../app/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
        $stmt->execute([$title, $description]);
        
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; }
        input, textarea { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Ajouter une nouvelle tâche</h1>
    <form action="ajouter-tache.php" method="POST">
        <label>Titre *</label>
        <input type="text" name="title" required>
        <label>Description</label>
        <textarea name="description" rows="4"></textarea>
        <button type="submit">Enregistrer</button>
        <a href="index.php">Annuler</a>
    </form>
</body>
</html>

