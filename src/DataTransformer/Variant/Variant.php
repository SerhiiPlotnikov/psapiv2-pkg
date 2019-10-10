<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Variant;

use Psapiv2\DataTransformer\AbstractObjectHydrator;
use Psapiv2\DataTransformer\Option\OptionCollection;

class Variant extends AbstractObjectHydrator
{
    public $code;
    public $image;
    public $options;

    protected $hydrates = [
        'options' => OptionCollection::class
    ];
}
