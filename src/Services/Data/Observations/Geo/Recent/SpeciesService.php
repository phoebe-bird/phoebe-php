<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo\Recent;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\Recent\SpeciesContract;

final class SpeciesService implements SpeciesContract
{
    /**
     * @api
     */
    public SpeciesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeciesRawService($client);
    }

    /**
     * @api
     *
     * Get all observations of a species, seen up to 30 days ago, at any location within a radius of up to 50 kilometers, from a given set of coordinates. Results include only the most recent observation from each location in the region specified.
     *
     * #### URL parameters
     *
     * | Name | Description |
     * | ---------- | ----------- |
     * | speciesCode | The eBird species code. |
     * #### Notes
     * The species code is typically a 6-letter code, e.g. horlar for Horned Lark. You can get complete set of species code from the GET eBird Taxonomy end-point.
     *
     * @param string $speciesCode the eBird species code
     * @param int $back the number of days back to fetch observations
     * @param int $dist the search radius from the given position, in kilometers
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional include observations which have not yet been reviewed
     * @param int $maxResults Only fetch this number of observations
     * @param string $sppLocale Use this language for species common names
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
        int $dist = 25,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        string $sppLocale = 'en',
        ?RequestOptions $requestOptions = null,
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
