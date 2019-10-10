<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\Category\ChannelCategoryCollection;
use Psapiv2\Exceptions\InvalidArgumentException;

final class ChannelCategoryResource extends Resource
{
    private const AVAILABLE_ROUTES = [
        "/channel/{channel_id}/category" => '%^/channel/\d+/category$%',
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            return ApiResponse::success((new ChannelCategoryCollection($response->result))->getResponse());
        }
        return ApiResponse::error($response);
    }

    public function getUri(): string
    {
        return $this->findUri(self::AVAILABLE_ROUTES);
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

    public function parent(int $parentId): self
    {
        if ($parentId <= 0) {
            throw new InvalidArgumentException("Invalid parent identifier. Value must be a positive integer");
        }
        $this->queryString['parent'] = $parentId;
        return $this;
    }

    public function id(int $categoryId): self
    {
        if ($categoryId <= 0) {
            throw new InvalidArgumentException("Invalid category identifier. Value must be a positive integer");
        }
        $this->queryString['id'] = $categoryId;
        return $this;
    }
}
