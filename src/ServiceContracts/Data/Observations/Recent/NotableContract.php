<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams\Detail;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface NotableContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $back the number of days back to fetch observations
     * @param Detail|value-of<Detail> $detail include a subset (simple), or all (full), of the fields available
     * @param bool $hotspot Only fetch observations from hotspots
     * @param int $maxResults Only fetch this number of observations
     * @param list<string> $r Fetch observations from up to 10 locations
     * @param string $sppLocale Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        int $back = 14,
        Detail|string $detail = 'simple',
        bool $hotspot = false,
        int $maxResults = 10000,
        ?array $r = null,
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
