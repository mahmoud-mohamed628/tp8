<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Générateur de mot de passe</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Générateur de mot de passe</h2>

        <form method="post" action="" class="space-y-4">
            <div>
                <label class="block font-medium">Longueur du mot de passe :</label>
                <input type="number" name="length" required class="w-full border px-3 py-2 rounded">
            </div>

            <button type="submit" name="generate" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Générer
            </button>
        </form>

        <?php
        function generatePassword($length) {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}<>?';
            $password = '';
            $maxIndex = strlen($chars) - 1;

            for ($i = 0; $i < $length; $i++) {
                $password .= $chars[random_int(0, $maxIndex)];
            }

            return $password;
        }

        if (isset($_POST['generate'])) {
            $length = $_POST['length'];

           
                $password = generatePassword($length);
                echo "<div class='mt-6 text-center font-mono bg-gray-200 p-4 rounded'>";
                echo " Mot de passe : <strong>$password</strong>";
                echo "</div>";
          
        }
        ?>
    </div>
</body>
</html>
