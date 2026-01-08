<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Cat;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Detail;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Rank;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface HistoricContract
{
    /**
     * @api
     *
     * @param int $d Path param:
     * @param string $regionCode path param: The country, subnational1, subnational2 or location code
     * @param int $y Path param:
     * @param int $m Path param:
     * @param Cat|value-of<Cat> $cat Query param: Only fetch observations from these taxonomic categories
     * @param Detail|value-of<Detail> $detail query param: Include a subset (simple), or all (full), of the fields available
     * @param bool $hotspot Query param: Only fetch observations from hotspots
     * @param bool $includeProvisional query param: Include observations which have not yet been reviewed
     * @param int $maxResults Query param: Only fetch this number of observations
     * @param list<string> $r Query param: Fetch observations from up to 50 locations
     * @param Rank|value-of<Rank> $rank Query param: Include latest observation of the day, or the first added
     * @param string $sppLocale Query param: Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        int $d,
        string $regionCode,
        int $y,
        int $m,
        Cat|string|null $cat = null,
        Detail|string $detail = 'simple',
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        ?array $r = null,
        Rank|string $rank = 'mrec',
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
