<?php
declare(strict_types=1);

namespace Psapiv2\Services;

use Psapiv2\DataTransformer\ApiResponse;
use Psapiv2\DataTransformer\Configuration;
use Psapiv2\DataTransformer\ShortConfiguration;

final class ConfigurationResource extends Resource
{
    private const AVAILABLE_ROUTES = [
        "/configuration/{configuration_id}" => '%^/configuration/\d+$%',
        "/channel/{channel_id}}/configuration" => '%^/channel/\d+/configuration$%'
    ];

    public function get(): ApiResponse
    {
        $this->client->setMethod('get');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            return ApiResponse::success(new Configuration($response));
        }
        return ApiResponse::error($response);
    }

    public function create(): ApiResponse
    {
        $this->client->setMethod('post');
        $response = $this->client->sendRequest($this->getUri(), $this->getQueryString());
        if ($response->status === 'success') {
            return ApiResponse::success(new ShortConfiguration($response->result));
        }
        return ApiResponse::error($response);
    }

    public function byChannelId(int $channelId): self
    {
        $this->paramsAttr['{channel_id}'] = $channelId;
        return $this;
    }

    public function byConfigurationId(int $configurationId): self
    {
        $this->paramsAttr['{configuration_id}'] = $configurationId;
        return $this;
    }

    public function getUri(): string
    {
        return $this->findUri(self::AVAILABLE_ROUTES);
    }
}
