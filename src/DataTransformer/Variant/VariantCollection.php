<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Variant;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

class VariantCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Variant::class;
}
