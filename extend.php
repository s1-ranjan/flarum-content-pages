<?php

namespace Dhtml\ContentPages;

use Flarum\Extend;
use Dhtml\ContentPages\Controller\ShowPageController;

return [

    (new Extend\Routes('forum'))
        ->get('/{slug:[a-z0-9\-]+}', 'content-pages.page', ShowPageController::class),

];
