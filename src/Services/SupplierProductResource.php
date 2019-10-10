<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\SupplierProduct\SupplierProduct;
use Psapiv2\DataTransformer\SupplierProduct\SupplierProductCollection;

final class SupplierProductResource extends Resource
{
    private const AVAILABLE_ROUTES = [
        "/supplier/product" => '%^/supplier/product$%',
        "/supplier/product/{product_pim_id}" => '%^/supplier/product/\d+$%'
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            if (property_exists($response->result, 'items')) {
                return ApiResponse::success((new SupplierProductCollection($response->result))->getResponse());
            }
            return ApiResponse::success(new SupplierProduct($response->result));
        }
        return ApiResponse::error($response);
    }

    public function byProductId(int $productId): self
    {
        $this->paramsAttr['{product_pim_id}'] = $productId;
        return $this;
    }

    public function getUri(): string
    {
        return $this->findUri(self::AVAILABLE_ROUTES);
    }

    public function search(string $term): self
    {
        $this->queryString['search'] = $term;
        return $this;
    }

    public function codeIn(string $codeIn): self
    {
        $this->queryString['code_in'] = $codeIn;
        return $this;
    }

    public function setPimIdIn(string $pimIdIn): self
    {
        $this->queryString['pim_id_in'] = $pimIdIn;
        return $this;
    }

    public function withCancelled(): self
    {
        $this->queryString['withCancelled'] = true;
        return $this;
    }

    public function withVariants(): self
    {
        $this->queryString['withVariants'] = true;
        return $this;
    }
}
