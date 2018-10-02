<?php snippet('header')?>

    <h1><?= $page->title()->html() ?></h1>

    <div class="text">
        <?=$page->text()->kirbytext()?>
    </div>

    <div class="entries">

        <?php foreach ($page->children()->visible() as $entry): ?>

            <h2 class="article-title">
                <a href="<?= $entry->url() ?>/<?= $entry->contentfile() ?>">

                    <?php if (!$entry->identifying_color()->empty()): ?>
                        <div class="color" style="background: <?=$entry->identifying_color() ?>;"></div>
                    <?php endif?>

                    <span class="title">
                        <?= $entry->title()->html() ?>
                    </span>

                </a>
            </h2>

        <?php endforeach?>

    </div>

<?php snippet('footer')?>
