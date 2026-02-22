<?php

namespace Dhtml\ContentPages;

class PageRepository
{
    public function findBySlug(string $slug)
    {
        return Page::where('slug', $slug)
            ->where('is_published', 1)
            ->first();
    }
}
