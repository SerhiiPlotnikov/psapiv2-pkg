<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Review;

use Psapiv2\DataTransformer\EntityCollection;

class ReviewCollection extends EntityCollection
{
    public function getResponse(): array
    {
        $meta = array_filter((array)$this->collection, function ($key) {
            return $key !== 'items';
        }, ARRAY_FILTER_USE_KEY);

        $items = array_map(function ($item) {
            return new Review($item);
        }, $this->collection->items);

        return ['items' => $items, 'meta' => $meta];
    }
}
