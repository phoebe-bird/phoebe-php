<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams\Detail;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface NotableContract
{
    /**
     * @api
     *
     * @param int $back the number of days back to fetch observations
     * @param Detail|value-of<Detail> $detail include a subset (simple), or all (full), of the fields available
     * @param int $dist the search radius from the given position, in kilometers
     * @param bool $hotspot Only fetch observations from hotspots
     * @param int $maxResults Only fetch this number of observations
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
        Detail|string $detail = 'simple',
        int $dist = 25,
        bool $hotspot = false,
        int $maxResults = 10000,
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
