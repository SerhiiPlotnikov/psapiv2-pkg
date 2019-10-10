<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\Exceptions\InvalidArgumentException;
use Psapiv2\Exceptions\InvalidUriException;

abstract class Resource
{
    protected $paramsAttr = [];
    protected $queryString = [];
    protected $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    abstract public function get();

    protected function findUri(array $availableRoutes): string
    {
        foreach ($availableRoutes as $uri => $pattern) {
            $replaced = str_replace(array_keys($this->paramsAttr), array_values($this->paramsAttr), $uri, $count);
            if (preg_match($pattern, $replaced) && $count === count($this->paramsAttr)) {
                return $replaced;
            }
        }
        throw new InvalidUriException("No route found");
    }

    protected function getQueryString(): string
    {
        return http_build_query($this->queryString);
    }

    public function itemsPerPage(int $itemsPerPage): self
    {
        if ($itemsPerPage <= 0) {
            throw new InvalidArgumentException("Invalid items per page. Value must be a positive integer");
        }
        $this->queryString['itemsPerPage'] = $itemsPerPage;
        return $this;
    }

    public function page(int $page): self
    {
        if ($page <= 0) {
            throw new InvalidArgumentException("Invalid page. Value must be a positive integer");
        }
        $this->queryString['page'] = $page;
        return $this;
    }
}
