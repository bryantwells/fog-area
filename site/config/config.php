<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('debug', true);

c::set('routes', array(
    array(

        // route rule for any url that starts with 'works/'
        // like 'works/room', 'works/fancy-room', etc...

        // the url pattern
        'pattern' => 'works/(:any)',

        // the action performed when the url is hit
        'action' => function ($uid) {

            // get the sort number for the page associated with the UID (:any)
            $sortNum = site()->children()->works()->find($uid)->num();

            // redirect to the actual page
            go('content/1-works/' . $sortNum . '-' . $uid . '/');
        },

    ),
));