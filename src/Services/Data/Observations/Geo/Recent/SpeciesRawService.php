<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo\Recent;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Species\SpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\Recent\SpeciesRawContract;

/**
 * The data/obs end-points are used to fetch observations submitted to eBird in checklists. There are two categories of end-point: 1. Fetch observations for a specific country, region or location. 2. Fetch observations for nearby locations - up to a distance of 50km. Each end-point supports optional query parameters which allow you to filter the list of observations returned.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class SpeciesRawService implements SpeciesRawContract
{
    // @phpstan-ignore-next-line
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
     * }|SpecieListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|SpecieListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpecieListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['data/obs/geo/recent/%1$s', $speciesCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
