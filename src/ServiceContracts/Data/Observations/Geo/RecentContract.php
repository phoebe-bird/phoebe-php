<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Cat;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Sort;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface RecentContract
{
    /**
     * @api
     *
     * @param int $back the number of days back to fetch observations
     * @param Cat|value-of<Cat> $cat Only fetch observations from these taxonomic categories
     * @param int $dist the search radius from the given position, in kilometers
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional include observations which have not yet been reviewed
     * @param int $maxResults Only fetch this number of observations
     * @param Sort|value-of<Sort> $sort sort observations by taxonomy or by date, most recent first
     * @param string $sppLocale Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        float $lat,
        float $lng,
        int $back = 14,
        Cat|string|null $cat = null,
        int $dist = 25,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        Sort|string $sort = 'date',
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
