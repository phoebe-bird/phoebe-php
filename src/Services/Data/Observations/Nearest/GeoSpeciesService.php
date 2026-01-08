<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Nearest;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Nearest\GeoSpeciesContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class GeoSpeciesService implements GeoSpeciesContract
{
    /**
     * @api
     */
    public GeoSpeciesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GeoSpeciesRawService($client);
    }

    /**
     * @api
     *
     * Find the nearest locations where a species has been seen recently. #### Notes The species code is typically a 6-letter code, e.g. barswa for Barn Swallow. You can get complete set of species code from the GET eBird Taxonomy end-point.
     *
     * @param string $speciesCode the eBird species code
     * @param int $back the number of days back to fetch observations
     * @param int $dist Only fetch observations within this distance of the provided lat/lng
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional include observations which have not yet been reviewed
     * @param int $maxResults Only fetch up to this number of observations
     * @param string $sppLocale Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        float $lat,
        float $lng,
        int $back = 14,
        int $dist = 50,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 3000,
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'lat' => $lat,
                'lng' => $lng,
                'back' => $back,
                'dist' => $dist,
                'hotspot' => $hotspot,
                'includeProvisional' => $includeProvisional,
                'maxResults' => $maxResults,
                'sppLocale' => $sppLocale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($speciesCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
