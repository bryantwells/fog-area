<?php

$text = $_POST['text'];

function generate($text) {
    $pattern = '/(.)\1*/';

    $letters = str_split($text);
    sort($letters);
    $letters = implode($letters);
    preg_match_all($pattern, $letters, $result);

    $element = '<div class="Group">';

    foreach ($result[0] as $value) {
        $element = $element . '<div class="Group-item">' . $value . '</div>';
    }

    $element = $element . '</div>';

    return $element;
}

?>


<!--------------------->

<!DOCTYPE html>
<html>

	<head>
        <title>Name Generator Results</title>
        <link rel="stylesheet" href="assets/css/main.css">
	</head>

	<body>
        <h1>Organize</h1>
        <main class="Main Main--exclaim">
            <p><?= generate($text) ?></p>            
        </main>
        <nav class="Nav">
            <a class="Nav-item" href="/">
                <button class="Nav-button" type="submit">Back</button>
            </a>
            <form class="Nav-item" action="_poem.php" method="post">
                <input type="hidden" name="text" value="<?= $text ?>">
                <button class="Nav-button" type="submit">Poem</button>
            </form>
        </nav>
    </body>
    
</html>