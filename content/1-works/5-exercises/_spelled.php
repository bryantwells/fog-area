<?php

$text = $_POST['text'];

function generate($text) {
    $pattern = '/[a-z]/';
    $dictionary = [
        'a' => 'aye',
        'b' => 'bee',
        'c' => 'cee',
        'd' => 'dee',
        'e' => 'ee',
        'f' => 'ef',
        'g' => 'gee',
        'h' => 'aytch',
        'i' => 'eye',
        'j' => 'jay',
        'k' => 'kay',
        'l' => 'el',
        'm' => 'em',
        'n' => 'en',
        'o' => 'oh',
        'p' => 'pee',
        'q' => 'kue',
        'r' => 'ahr',
        's' => 'es',
        't' => 'tee',
        'u' => 'yooh',
        'v' => 'vee',
        'w' => 'dubblyooh',
        'x' => 'ex',
        'y' => 'why',
        'z' => 'zee'
    ];
    
    $text = strtolower($text);
    $result = preg_replace_callback($pattern, function($match) use($dictionary) { 
        return $dictionary[$match[0]]; 
    }, $text);
    
    return $result;
}

?>


<!--------------------->

<!DOCTYPE html>
<html>

	<head>
        <title>Exercises in Style: Spelled Out</title>
        <link rel="stylesheet" href="assets/css/main.css">
	</head>

	<body>
        <h1>Spelled Out</h1>
        <main class="Main Main--spelled">
            <p><?= generate($text) ?></p>            
        </main>
        <nav class="Nav">
            <a class="Nav-item" href="/">
                <button class="Nav-button" type="submit">Again</button>
            </a>
        </nav>
    </body>
    
</html>