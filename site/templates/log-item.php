<?php snippet('header') ?>

<nav>
    <a href="/">Back</a>
</nav>
<main class="LogItem">
    <header class="LogItem-header">
        <img class="LogItem-image u-veryFoggy" src="<?= $page->image()->url() ?>" alt="">
    </header>
    <blockquote class="LogItem-quote"><?php echo $page->text() ?></blockquote>
    <cite class="LogItem-cite"><?php echo $page->source() ?></cite>
</main>

<?php snippet('footer') ?>