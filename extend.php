<?php

namespace Dhtml\FlarumContentPages;

use Flarum\Extend;
use Dhtml\FlarumContentPages\Api\Controllers\DataApiController;
use Dhtml\FlarumContentPages\Api\Controllers\PagesApiController;
use Dhtml\FlarumContentPages\Providers\LocaleServiceProvider;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less')
        ->route('/about-us', 'about-us')
        ->route('/contact-us', 'contact-us')
        ->route('/terms', 'terms')
        ->route('/guidelines', 'guidelines')
        ->route('/privacy-policy', 'privacy-policy')
        ->route('/download', 'download'),

    new Extend\Locales(__DIR__.'/locale'),

    (new Extend\Routes('api'))
        ->get('/cpage/{slug}', 'cpages.load', PagesApiController::class),

    (new Extend\Routes('api'))
        ->get('/cpages-data', 'cpages.data', DataApiController::class),

    (new Extend\ServiceProvider())
        ->register(LocaleServiceProvider::class),
];
