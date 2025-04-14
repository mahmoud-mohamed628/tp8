<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded shadow-md text-center">
    <h2 class="text-2xl font-bold mb-4"> Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> !</h2>
    <p class="mb-6">Vous êtes connecté avec succès.</p>
    <a href="logout.php" class="text-red-600 font-medium underline">Se déconnecter</a>
</div>
</body>
</html>
