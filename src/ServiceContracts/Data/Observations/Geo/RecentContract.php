<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Cat;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Sort;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

interface RecentContract
{
    /**
     * @api
     *
     * @param int $back the number of days back to fetch observations
     * @param 'species'|'slash'|'issf'|'spuh'|'hybrid'|'domestic'|'form'|'intergrade'|Cat $cat Only fetch observations from these taxonomic categories
     * @param int $dist the search radius from the given position, in kilometers
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional include observations which have not yet been reviewed
     * @param int $maxResults Only fetch this number of observations
     * @param 'date'|'species'|Sort $sort sort observations by taxonomy or by date, most recent first
     * @param string $sppLocale Use this language for species common names
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        float $lat,
        float $lng,
        int $back = 14,
        string|Cat|null $cat = null,
        int $dist = 25,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        string|Sort $sort = 'date',
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array;
}
