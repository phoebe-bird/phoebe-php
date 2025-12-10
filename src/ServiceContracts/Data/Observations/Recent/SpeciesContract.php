<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

interface SpeciesContract
{
    /**
     * @api
     *
     * @param string $speciesCode path param: The eBird species code
     * @param string $regionCode path param: The country, subnational1, subnational2 or location code
     * @param int $back query param: The number of days back to fetch observations
     * @param bool $hotspot Query param: Only fetch observations from hotspots
     * @param bool $includeProvisional query param: Include observations which have not yet been reviewed
     * @param int $maxResults Query param: Only fetch this number of observations
     * @param list<string> $r Query param: Fetch observations from up to 10 locations
     * @param string $sppLocale Query param: Use this language for species common names
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function retrieve(
        string $speciesCode,
        string $regionCode,
        int $back = 14,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        ?array $r = null,
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array;
}
