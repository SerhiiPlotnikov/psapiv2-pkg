<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\Supplier\Supplier;
use Psapiv2\DataTransformer\Supplier\SupplierCollection;

final class SupplierResource extends Resource
{
    private const AVAILABLE_ROUTES = [
        "/supplier" => '%^/supplier$%',
        "/supplier/{supplier_code}" => '%^/supplier/[a-zA-Z0-9]+$%',
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            if (property_exists($response->result, 'items')) {
                return ApiResponse::success((new SupplierCollection($response->result))->getResponse());
            }
            return ApiResponse::success(new Supplier($response->result));
        }
        return ApiResponse::error($response);
    }

    private function getUri(): string
    {
        return $this->findUri(self::AVAILABLE_ROUTES);
    }

    public function bySupplierCode(string $supplierCode): self
    {
        $this->paramsAttr['{supplier_code}'] = $supplierCode;
        return $this;
    }

    public function search(string $term): self
    {
        $this->queryString['search'] = $term;
        return $this;
    }

    public function code(string $code): self
    {
        $this->queryString['code'] = $code;
        return $this;
    }
}
