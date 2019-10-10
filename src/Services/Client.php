<?php
declare(strict_types=1);

namespace Psapiv2\Services;

final class Client extends HttpClient
{
    public function __construct(string $host, string $token)
    {
        parent::__construct($host, $token);
    }

    public function channelProduct(): ChannelProductResource
    {
        return new ChannelProductResource($this);
    }

    public function channel(): ChannelResource
    {
        return new ChannelResource($this);
    }

    public function supplier(): SupplierResource
    {
        return new SupplierResource($this);
    }

    public function supplierProduct(): SupplierProductResource
    {
        return new SupplierProductResource($this);
    }

    public function channelCategory(): ChannelCategoryResource
    {
        return new ChannelCategoryResource($this);
    }

    public function configuration(): ConfigurationResource
    {
        return new ConfigurationResource($this);
    }
}
