<?php
$questions = [
    [
        "question" => "Quel est le livre sacré de l'islam ?",
        "options" => ["Bible", "Torah", "Coran", "Injil"],
        "answer" => "Coran"
    ],
    [
        "question" => "Combien de prières (salat) un musulman doit-il accomplir chaque jour ?",
        "options" => ["3", "5", "7", "2"],
        "answer" => "5"
    ],
    [
        "question" => "Comment s'appelle le dernier prophète de l'islam ?",
        "options" => ["Moussa", "Issa", "Mohammed", "Ibrahim"],
        "answer" => "Mohammed"
    ],
    [
        "question" => "Quelle ville est considérée comme la plus sainte en islam ?",
        "options" => ["Médine", "Jérusalem", "La Mecque", "Bagdad"],
        "answer" => "La Mecque"
    ],
    [
        "question" => "Quel mois est dédié au jeûne dans l'islam ?",
        "options" => ["Mouharram", "Ramadan", "Chaabane", "Dhou al-Hijja"],
        "answer" => "Ramadan"
    ],
];


$score = 0;
$correction = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($questions as $index => $q) {
        $user_answer = $_POST["q$index"] ?? "";
        $is_correct = ($user_answer === $q["answer"]);
        $correction[] = [
            "question" => $q["question"],
            "user_answer" => $user_answer,
            "correct_answer" => $q["answer"],
            "is_correct" => $is_correct
        ];
        if ($is_correct) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Mini Quiz</h1>

        <?php if ($_SERVER["REQUEST_METHOD"] !== "POST"): ?>
            <form method="post" action="" class="space-y-6">
                <?php foreach ($questions as $index => $q): ?>
                    <div>
                        <p class="font-semibold mb-2"><?= ($index + 1) . '. ' . $q["question"] ?></p>
                        <?php foreach ($q["options"] as $option): ?>
                            <label class="block">
                                <input type="radio" name="q<?= $index ?>" value="<?= $option ?>" required>
                                <?= $option ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Valider 
                </button>
            </form>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($correction as $i => $res): ?>
                    <div class="p-4 rounded border <?= $res["is_correct"] ? 'border-green-500 bg-green-50' : 'border-red-500 bg-red-50' ?>">
                        <p class="font-medium"><?= ($i + 1) . '. ' . $res["question"] ?></p>
                        <p>Votre réponse : <strong><?= htmlspecialchars($res["user_answer"]) ?></strong></p>
                        <?php if (!$res["is_correct"]): ?>
                            <p class="text-red-600">Bonne réponse : <strong><?= $res["correct_answer"] ?></strong></p>
                        <?php else: ?>
                            <p class="text-green-600"> Bonne réponse !</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <div class="mt-6 text-center text-xl font-bold">
                     Score final : <?= $score ?>/<?= count($questions) ?>
                </div>

                <div class="mt-4 text-center">
                    <a href="" class="text-blue-600 underline">Recommencer le quiz</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
