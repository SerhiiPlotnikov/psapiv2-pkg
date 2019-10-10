<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\ChannelProduct\ChannelProduct;
use Psapiv2\DataTransformer\ChannelProduct\ChannelProductCollection;

final class ChannelProductResource extends Resource
{
    private const AVAILABLE_ROUTES = [
        "/channel/{channel_id}/category/{category_id}/product" => '%^/channel/\d+/category/\d+/product$%',
        "/channel/{channel_id}/product/{product_pim_id}" => '%^/channel/\d+/product/\d+$%',
        "/channel/{channel_id}/product" => '%^/channel/\d+/product$%'
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            if (property_exists($response->result, 'items')) {
                return ApiResponse::success((new ChannelProductCollection($response->result))->getResponse());
            }
            return ApiResponse::success(new ChannelProduct($response->result));
        }
        return ApiResponse::error($response);
    }

    public function byChannelId(int $channelId): self
    {
        $this->paramsAttr['{channel_id}'] = $channelId;
        return $this;
    }

    public function byProductId(int $productId): self
    {
        $this->paramsAttr['{product_pim_id}'] = $productId;
        return $this;
    }

    public function byCategoryId(int $categoryId): self
    {
        $this->paramsAttr['{category_id}'] = $categoryId;
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

    public function code(string $code): self
    {
        $this->queryString['code'] = $code;
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
