<?php

$text = $_POST['text'];

function generate($text) {
    $sentences = explode('.', $text);
    $result = implode('<strong>!</strong>', $sentences);
    return $result;
}

?>


<!--------------------->

<!DOCTYPE html>
<html>

	<head>
        <title>Exercises in Style: Exclaim</title>
        <link rel="stylesheet" href="assets/css/main.css">
	</head>

	<body>
        <h1>Exclaim</h1>
        <main class="Main Main--exclaim">
            <p><?= generate($text) ?></p>            
        </main>
        <nav class="Nav">
            <a class="Nav-item" href="/">
                <button class="Nav-button" type="submit">Back</button>
            </a>
            <form class="Nav-item" action="_organize.php" method="post">
                <input type="hidden" name="text" value="<?= $text ?>">
                <button class="Nav-button" type="submit">Organized</button>
            </form>
        </nav>
    </body>
    
</html>