<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

use Carbon\Carbon;

class AbstractObjectHydrator
{
    protected $casts = [];
    protected $hydrates = [];

    public function __construct(?\stdClass $data)
    {
        if ($data) {
            $this->hydrateProperties($data);
            $this->castProperties();
            foreach ($this->hydrates as $property => $class) {
                $this->hydrateObject($class, $property, $data);
            }
        }
    }

    private function hydrateProperties(\stdClass $data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    private function hydrateObject(string $class, string $property, \stdClass $parentObj): void
    {
        if (property_exists($parentObj, $property)) {
            $this->$property = $parentObj->$property ? new $class($parentObj->$property) : null;
        }
    }

    private function castProperties(): void
    {
        foreach ($this->casts as $property => $type) {
            if (isset($this->$property)) {
                switch ($type) {
                    case 'date':
                        $this->$property = Carbon::parse($this->$property);
                        break;
                }
            }
        }
    }
}
