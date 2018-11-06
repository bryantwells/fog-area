<?php

$text = $_POST['text'];

function generate($text) {
    $pattern = '/(?<=[\.\,\:\;\?\!])|(?=\bthe\b)/';
    $result = preg_split($pattern, $text);
    return implode('<br>',$result);
}

?>


<!--------------------->

<!DOCTYPE html>
<html>

	<head>
        <title>Exercises in Style: Poem</title>
        <link rel="stylesheet" href="assets/css/main.css">
	</head>

	<body>
        <h1>Poem</h1>
        <main class="Main Main--poem">
            <p><?= generate($text) ?></p>            
        </main>
        <nav class="Nav">
            <a class="Nav-item" href="/">
                <button class="Nav-button" type="submit">Back</button>
            </a>
            <form class="Nav-item" action="_spelled.php" method="post">
                <input type="hidden" name="text" value="<?= $text ?>">
                <button class="Nav-button" type="submit">Spelled Out</button>
            </form>
        </nav>
    </body>
    
</html>