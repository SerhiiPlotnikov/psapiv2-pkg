<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Category;

use Psapiv2\DataTransformer\AbstractObjectHydrator;

final class Category extends AbstractObjectHydrator
{
    public $id;
    public $name;
    public $department_name;
    public $children;
    public $parent;

    public function __construct(?\stdClass $data)
    {
        parent::__construct($data);
    }

    protected $hydrates = [
        'children' => CategoryCollection::class,
        'parent' => Category::class
    ];
}
