<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Recent;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Cat;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Detail;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Rank;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Recent\HistoricContract;

final class HistoricService implements HistoricContract
{
    /**
     * @api
     */
    public HistoricRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new HistoricRawService($client);
    }

    /**
     * @api
     *
     * Get a list of all taxa seen in a country, region or location on a specific date, with the specific observations determined by the "rank" parameter (defaults to latest observation on the date).
     * #### Notes Responses may be cached for 30 minutes
     *
     * @param int $d Path param:
     * @param string $regionCode path param: The country, subnational1, subnational2 or location code
     * @param int $y Path param:
     * @param int $m Path param:
     * @param 'species'|'slash'|'issf'|'spuh'|'hybrid'|'domestic'|'form'|'intergrade'|Cat $cat Query param: Only fetch observations from these taxonomic categories
     * @param 'simple'|'full'|Detail $detail query param: Include a subset (simple), or all (full), of the fields available
     * @param bool $hotspot Query param: Only fetch observations from hotspots
     * @param bool $includeProvisional query param: Include observations which have not yet been reviewed
     * @param int $maxResults Query param: Only fetch this number of observations
     * @param list<string> $r Query param: Fetch observations from up to 50 locations
     * @param 'mrec'|'create'|Rank $rank Query param: Include latest observation of the day, or the first added
     * @param string $sppLocale Query param: Use this language for species common names
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
        string|Cat|null $cat = null,
        string|Detail $detail = 'simple',
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        ?array $r = null,
        string|Rank $rank = 'mrec',
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'regionCode' => $regionCode,
                'y' => $y,
                'm' => $m,
                'cat' => $cat,
                'detail' => $detail,
                'hotspot' => $hotspot,
                'includeProvisional' => $includeProvisional,
                'maxResults' => $maxResults,
                'r' => $r,
                'rank' => $rank,
                'sppLocale' => $sppLocale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($d, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
