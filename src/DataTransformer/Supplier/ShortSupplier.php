<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Supplier;

use Psapiv2\DataTransformer\AbstractObjectHydrator;

class ShortSupplier extends AbstractObjectHydrator
{
    public $code;
    public $name;
    public $description;
}
