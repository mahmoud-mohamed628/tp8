<?php

$filename = "guestbook.txt";
file_put_contents($filename, "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($message)) {
        $date = date("d/m/Y H:i:s");
        $entry = "  $name : $message </br> $date" . PHP_EOL;
        file_put_contents($filename, $entry, FILE_APPEND); 
    }
}

$messages = [];

if (file_exists($filename)) {
    $messages = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre d'or</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Livre d'or</h1>

        <form method="post" action="" class="space-y-4 mb-6">
            <div>
                <label class="block font-medium">Nom :</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label class="block font-medium">Message :</label>
                <textarea name="message" rows="3" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Laisser un message
            </button>
        </form>
        <div class="space-y-4">
            <h2 class="text-xl font-semibold mb-2"> Messages :</h2>
            <?php if (empty($messages)): ?>
                <p class="text-gray-500">Aucun message pour le moment.</p>
            <?php else: ?>
                <?php foreach ($messages as $msg): ?>
                    <div class="border-b pb-2">
                        <?= nl2br($msg) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
