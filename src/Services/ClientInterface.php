<?php
declare(strict_types=1);

namespace Psapiv2\Services;

interface ClientInterface
{
    public function channelProduct(): ChannelProductResource;

    public function channel(): ChannelResource;

    public function supplier(): SupplierResource;

    public function supplierProduct(): SupplierProductResource;

    public function channelCategory(): ChannelCategoryResource;

    public function configuration(): ConfigurationResource;
}
