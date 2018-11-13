<?php snippet('header') ?>

    <!-- HEADER -->
    <header>
        <h1><?= $site->title()->html() ?></h1>
    </header>
    
    <!-- MAIN -->
    <main>
        <?php snippet('entry-list') ?>   
    </main>

<?php snippet('footer') ?>