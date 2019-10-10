<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Category;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class CategoryCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Category::class;
}
