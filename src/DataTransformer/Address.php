<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

final class Address extends AbstractObjectHydrator
{
    public $street1;
    public $street2;
    public $city;
    public $state;
    public $country;
    public $postal;
    public $fob;
    public $fob_state;

    public function __construct(?\stdClass $data = null)
    {
        parent::__construct($data);
    }
}
