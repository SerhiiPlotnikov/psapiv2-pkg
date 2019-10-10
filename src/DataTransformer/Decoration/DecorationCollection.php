<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Decoration;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class DecorationCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Decoration::class;

    public function __construct(?array $data)
    {
        parent::__construct($data);
        $this->uasort(function ($a, $b) {
            return $a->name >= $b->name;
        });
    }
}
