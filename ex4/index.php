<!DOCTYPE html>
               echo "<p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
                echo "</div>";
            } else {
                echo "<div class='mt-6 text-red-600'>Veuillez remplir tous les champs.</div>";
            }
        }
        ?>
    </div>
</body><html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Formulaire de Contact</h2>

        <form method="post" action="" class="space-y-4">
            <div>
                <label class="block font-medium">Nom :</label>
                <input type="text" name="nom" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div>
                <label class="block font-medium">Email :</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div>
                <label class="block font-medium">Message :</label>
                <textarea name="message" rows="4" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>

            <button type="submit" name="envoyer" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Envoyer
            </button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            if (!empty($nom) && !empty($email) && !empty($message)) {
                echo "<div class='mt-6 bg-green-100 p-4 rounded'>";
                echo "<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>";
                echo "<p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>";
 
</html>
