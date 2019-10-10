<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Supplier;

use Psapiv2\DataTransformer\EntityCollection;

class SupplierCollection extends EntityCollection
{
    public function getResponse(): array
    {
        $meta = array_filter((array)$this->collection, function ($key) {
            return $key !== 'items';
        }, ARRAY_FILTER_USE_KEY);

        $items = array_map(function ($item) {
            return new ShortSupplier($item);
        }, $this->collection->items);

        return ['items' => $items, 'meta' => $meta];
    }
}
