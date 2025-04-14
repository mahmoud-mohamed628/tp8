<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h2>Calculatrice simple</h2>

    <form method="post" action="">
        <label>Nombre 1 : </label>
        <input type="number" name="num1" required><br><br>

        <label>Nombre 2 : </label>
        <input type="number" name="num2" required><br><br>

        <label>Opération : </label>
        <select name="operation">
            <option value="ajou">+</option>
            <option value="def">-</option>
            <option value="mul">*</option>
            <option value="div">/</option>
        </select><br><br>

        <input type="submit" name="calculer" value="Calculer">
    </form>

    <?php
    if (isset($_POST['calculer'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $resultat = '';

        switch ($operation) {
            case 'ajou':
                $resultat = $num1 + $num2;
                echo "<p>Résultat : $num1 + $num2 = $resultat</p>";
                break;
            case 'def':
                $resultat = $num1 - $num2;
                echo "<p>Résultat : $num1 - $num2 = $resultat</p>";
                break;
            case 'mul':
                $resultat = $num1 * $num2;
                echo "<p>Résultat : $num1 × $num2 = $resultat</p>";
                break;
            case 'div':
                if ($num2 != 0) {
                    $resultat = $num1 / $num2;
                    echo "<p>Résultat : $num1 ÷ $num2 = $resultat</p>";
                } else {
                    echo "<p style='color:red;'>Erreur : Division par zéro impossible.</p>";
                }
                break;
            default:
                echo "<p>Opération non reconnue.</p>";
        }
    }
    ?>

</body>
</html>
