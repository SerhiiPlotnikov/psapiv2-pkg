<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\SupplierProduct;

use Psapiv2\DataTransformer\EntityCollection;

final class SupplierProductCollection extends EntityCollection
{
    public function getResponse(): array
    {
        $meta = array_filter((array)$this->collection, function ($key) {
            return $key !== 'items';
        }, ARRAY_FILTER_USE_KEY);

        $items = array_map(function ($item) {
            return new ShortSupplierProduct($item);
        }, $this->collection->items);

        return ['items' => $items, 'meta' => $meta];
    }
}
