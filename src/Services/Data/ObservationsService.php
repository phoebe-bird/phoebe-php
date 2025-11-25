<?php

declare(strict_types=1);

namespace Phoebe\Services\Data;

use Phoebe\Client;
use Phoebe\ServiceContracts\Data\ObservationsContract;
use Phoebe\Services\Data\Observations\GeoService;
use Phoebe\Services\Data\Observations\NearestService;
use Phoebe\Services\Data\Observations\RecentService;

final class ObservationsService implements ObservationsContract
{
    /**
     * @api
     */
    public RecentService $recent;

    /**
     * @api
     */
    public GeoService $geo;

    /**
     * @api
     */
    public NearestService $nearest;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->recent = new RecentService($client);
        $this->geo = new GeoService($client);
        $this->nearest = new NearestService($client);
    }
}
