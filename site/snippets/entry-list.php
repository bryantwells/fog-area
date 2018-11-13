<?php
    // build a list of pages to show on the homepage
    $pages = [];

    // get all entries in the site
    foreach ($site->pages() as $page) {
        if ($page->onHomepage()->value()) {
            foreach ($page->children() as $child) {
                $pages[] = $child;
            }
        }
    }

    // sort all the entries by date
    usort($pages, function ($page1, $page2) {
        return $page1->date() <=> $page2->date();
    });

    // set begin and end dates
    $begin = new DateTime('2018-09-02');
    $end = new DateTime('now');

    // set time interval and period
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);

?>

<ul class="EntryList">
    <?php foreach ($period as $day): ?>
        <li class="EntryList-item u-foggy">
            <?php
                $pagesInDay = array_filter($pages, function ($page) use ($day) {
                    return $page->date('U') == $day->format('U');
                });
            ?>
            <?php foreach ($pagesInDay as $page): ?>
                
                <?php if ($page->parent()->title() == 'Works'): ?>
                    <h2 class="EntryList-title EntryList-title--work u-foggy">
                        <a href="<?= $page->url() ?>">
                            <?= $page->title() ?>
                        </a>
                    </h2>
                <?php elseif ($page->parent()->title() == 'Log'): ?>
                    <a href="<?= $page->url() ?>">
                        <img class="EntryList-image u-veryFoggy" src="<?= $page->image()->url() ?>" alt="">
                    </a>
                <?php endif ?>
            <?php endforeach; ?>
        </li>
    <?php endforeach; ?>
</ul>