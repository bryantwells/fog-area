<?php snippet('header')?>

    <h1>
        <?= $page->title()->html() ?>
    </h1>

    <!-- <div class="text">
        <?= $page->text()->kirbytext() ?>
    </div> -->

    <ul class="Entries">
        <?php 
            $pages = [];

            // get all entries in the site
            foreach ($site->pages() as $page) {
                if ($page->title() == 'Log' || $page->title() == 'Works') {
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

            // build the interface
            foreach ($period as $day) {

                echo '<li class="Entries-item">';

                echo '<!-- a single day passes -->';

                // create an array of all the entries that fall on the current day
                $pagesInDay = array_filter($pages, function ($page) use ($day) {
                    return $page->date('U') == $day->format('U');
                });

                // iterate through all the entries in the day
                foreach ($pagesInDay as $page) {
                    if ($page->parent()->title() == 'Works') {
                        echo '<a href="' . $page->url() . '">';
                        echo $page->title();
                        echo '</a>';
                    } else {
                        echo $page->title();
                    }
                    
                }

                echo '</li>';

            }

        ?>
    </ul>

<?php snippet('footer')?>
