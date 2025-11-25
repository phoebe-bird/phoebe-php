<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo\Recent;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Species\SpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\Recent\SpeciesContract;

final class SpeciesService implements SpeciesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   lat: float,
     *   lng: float,
     *   back?: int,
     *   dist?: int,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   sppLocale?: string,
     * }|SpecieListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|SpecieListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = SpecieListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['data/obs/geo/recent/%1$s', $speciesCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
