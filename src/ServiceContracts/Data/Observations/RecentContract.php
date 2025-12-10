<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\RecentListParams\Cat;
use Phoebe\RequestOptions;

interface RecentContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $back the number of days back to fetch observations
     * @param 'species'|'slash'|'issf'|'spuh'|'hybrid'|'domestic'|'form'|'intergrade'|Cat $cat Only fetch observations from these taxonomic categories
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional Include observations which have not yet been reviewed
     * @param int $maxResults Only fetch this number of observations
     * @param list<string> $r Fetch observations from up to 10 locations
     * @param string $sppLocale Use this language for species common names
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        int $back = 14,
        string|Cat|null $cat = null,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        ?array $r = null,
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array;
}
