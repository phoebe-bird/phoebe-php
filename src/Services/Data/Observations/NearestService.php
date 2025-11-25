<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations;

use Phoebe\Client;
use Phoebe\ServiceContracts\Data\Observations\NearestContract;
use Phoebe\Services\Data\Observations\Nearest\GeoSpeciesService;

final class NearestService implements NearestContract
{
    /**
     * @api
     */
    public GeoSpeciesService $geoSpecies;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->geoSpecies = new GeoSpeciesService($client);
    }
}
