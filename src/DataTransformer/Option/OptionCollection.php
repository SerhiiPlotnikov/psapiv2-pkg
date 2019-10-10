<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Option;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class OptionCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Option::class;
}
