<?php snippet('header') ?>

    <h1>
        <?= $page->title()->html() ?>
    </h1>

    <div class="text">
        <?= $page->text()->kirbytext() ?>
    </div>

<?php snippet('footer') ?>
