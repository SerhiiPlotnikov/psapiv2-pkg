<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Channel;

use Psapiv2\DataTransformer\EntityCollection;

final class ChannelCollection extends EntityCollection
{
    public function getResponse(): array
    {
        $meta = array_filter((array)$this->collection, function ($key) {
            return $key !== 'items';
        }, ARRAY_FILTER_USE_KEY);

        $items = array_map(function ($item) {
            return new ShortChannel($item);
        }, $this->collection->items);

        return ['items' => $items, 'meta' => $meta];
    }
}
