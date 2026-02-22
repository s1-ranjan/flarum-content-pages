<?php

namespace Dhtml\ContentPages\Controller;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ServerRequestInterface;
use Dhtml\ContentPages\PageRepository;

class ShowPageController
{
    protected $pages;

    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $slug = $request->getAttribute('slug');

        $reserved = ['d','u','tags','api','admin','assets'];

        if (in_array($slug, $reserved)) {
            return new HtmlResponse('', 404);
        }

        $page = $this->pages->findBySlug($slug);

        if (!$page) {
            return new HtmlResponse('Page not found', 404);
        }

        $html = "
        <div class='container'>
            <h1>{$page->title}</h1>
            <div>{$page->content}</div>
        </div>
        ";

        return new HtmlResponse($html);
    }
}
