<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="description" content="<?=$site->description()->html()?>">
        <?=css('assets/css/index.css')?>
        <title>
            <?=$site->title()->html()?> | <?=$page->title()->html()?>
        </title>
    </head>

    <body>

        <header class="Header">
            <?php snippet('menu')?>
        </header>
        
        <main class="Main">
