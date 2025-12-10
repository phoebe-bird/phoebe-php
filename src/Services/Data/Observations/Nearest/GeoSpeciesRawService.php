<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Nearest;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Nearest\GeoSpecies\GeoSpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Nearest\GeoSpeciesRawContract;

final class GeoSpeciesRawService implements GeoSpeciesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Find the nearest locations where a species has been seen recently. #### Notes The species code is typically a 6-letter code, e.g. barswa for Barn Swallow. You can get complete set of species code from the GET eBird Taxonomy end-point.
     *
     * @param string $speciesCode the eBird species code
     * @param array{
     *   lat: float,
     *   lng: float,
     *   back?: int,
     *   dist?: int,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   sppLocale?: string,
     * }|GeoSpecieListParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|GeoSpecieListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GeoSpecieListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['data/nearest/geo/recent/%1$s', $speciesCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
