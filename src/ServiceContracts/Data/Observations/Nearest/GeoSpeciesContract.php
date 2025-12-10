<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Nearest;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

interface GeoSpeciesContract
{
    /**
     * @api
     *
     * @param string $speciesCode the eBird species code
     * @param int $back the number of days back to fetch observations
     * @param int $dist Only fetch observations within this distance of the provided lat/lng
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional include observations which have not yet been reviewed
     * @param int $maxResults Only fetch up to this number of observations
     * @param string $sppLocale Use this language for species common names
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        float $lat,
        float $lng,
        int $back = 14,
        int $dist = 50,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 3000,
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array;
}
