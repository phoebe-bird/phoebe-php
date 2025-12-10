<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Recent;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams\Detail;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Recent\NotableContract;

final class NotableService implements NotableContract
{
    /**
     * @api
     */
    public NotableRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotableRawService($client);
    }

    /**
     * @api
     *
     * Get the list of recent, notable observations (up to 30 days ago) of birds seen in a country, region or location. Notable observations can be for locally or nationally rare species or are otherwise unusual, e.g. over-wintering birds in a species which is normally only a summer visitor.
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $back the number of days back to fetch observations
     * @param 'simple'|'full'|Detail $detail include a subset (simple), or all (full), of the fields available
     * @param bool $hotspot Only fetch observations from hotspots
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
        string|Detail $detail = 'simple',
        bool $hotspot = false,
        int $maxResults = 10000,
        ?array $r = null,
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'back' => $back,
            'detail' => $detail,
            'hotspot' => $hotspot,
            'maxResults' => $maxResults,
            'r' => $r,
            'sppLocale' => $sppLocale,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($regionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
