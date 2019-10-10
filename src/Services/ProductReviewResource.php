<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\Review\ReviewCollection;

class ProductReviewResource extends Resource
{
    private const AVAILABLE_ROUTES = [
        "/product/review/{product_pim_id}" => '%^/product/review/\d+$%',
        "/channel/{channel_id]}/product/review" => '%^/channel/\d+/product/review$%'
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            return ApiResponse::success((new ReviewCollection($response->result))->getResponse());
        }
        return ApiResponse::error($response);
    }

    public function byProductId(int $productId): self
    {
        $this->paramsAttr['{product_pim_id}'] = $productId;
        return $this;
    }

    public function byChannelId(int $channelId): self
    {
        $this->paramsAttr['{channel_id}'] = $channelId;
        return $this;
    }

    public function search(string $term): self
    {
        $this->queryString['search'] = $term;
        return $this;
    }

    public function getUri(): string
    {
        return $this->findUri(self::AVAILABLE_ROUTES);
    }
}
