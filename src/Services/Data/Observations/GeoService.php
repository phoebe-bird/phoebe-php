<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations;

use Phoebe\Client;
use Phoebe\ServiceContracts\Data\Observations\GeoContract;
use Phoebe\Services\Data\Observations\Geo\RecentService;

final class GeoService implements GeoContract
{
    /**
     * @api
     */
    public RecentService $recent;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->recent = new RecentService($client);
    }
}
