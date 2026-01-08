<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo\Recent;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams\Detail;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\Recent\NotableContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
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
     * Get the list of notable observations (up to 30 days ago) of birds seen at locations within a radius of up to 50 kilometers, from a given set of coordinates. Notable observations can be for locally or nationally rare species or are otherwise unusual, for example over-wintering birds in a species which is normally only a summer visitor.
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
    ): array {
        $params = Util::removeNulls(
            [
                'lat' => $lat,
                'lng' => $lng,
                'back' => $back,
                'detail' => $detail,
                'dist' => $dist,
                'hotspot' => $hotspot,
                'maxResults' => $maxResults,
                'sppLocale' => $sppLocale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
