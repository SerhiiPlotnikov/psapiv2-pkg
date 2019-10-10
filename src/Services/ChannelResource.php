<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\Channel\Channel;
use Psapiv2\DataTransformer\Channel\ChannelCollection;

final class ChannelResource extends Resource
{
    protected const AVAILABLE_ROUTES = [
        "/channel" => '%^/channel%',
        "/channel/{channel_id}" => '%^/channel/\d+$%',
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            if (property_exists($response->result, 'items')) {
                return ApiResponse::success((new ChannelCollection($response->result))->getResponse());
            }
            return ApiResponse::success(new Channel($response->result));
        }
        return ApiResponse::error($response);
    }

    public function create(): ApiResponse
    {
        $this->client->setMethod('post');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            return ApiResponse::success(new Channel($response->result));
        }
        return ApiResponse::error($response);
    }

    public function delete(): ApiResponse
    {
        $this->client->setMethod('delete');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            return ApiResponse::success(new Channel($response->result));
        }
        return ApiResponse::error($response);
    }

    public function byChannelId(int $channelId): self
    {
        $this->paramsAttr['{channel_id}'] = $channelId;
        return $this;
    }

    private function getUri(): string
    {
        return $this->findUri(self::AVAILABLE_ROUTES);
    }

    public function search(string $term): self
    {
        $this->queryString['search'] = $term;
        return $this;
    }

    public function postData(array $postData): self
    {
        $this->client->setPostData($postData);
        return $this;
    }
}
