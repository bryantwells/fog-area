<?php snippet('header') ?>


    <?php if(!$page->identifying_color()->empty()): ?>
        <style>
            body { background-color: <?= $page->identifying_color() ?>; }
        </style>
    <?php endif ?>

    <h1>
        <?= $page->title()->html() ?>
    </h1>

    <?php if ($page->hide_date()->int() != 1): ?>
        <div class="date">
            <?= $page->date('Y-m-d') ?>
        </div>
    <?php endif ?>

    <div class="text">
        <?= $page->text()->kirbytext() ?>
    </div>

    <hr />

    <div class="back">
        <a href="<?= $page->parent()->url() ?>">
            Back to <?= $page->parent()->title() ?>
        </a>
    </div>

<?php snippet('footer') ?>
