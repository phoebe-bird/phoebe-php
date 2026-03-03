<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Cat;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Sort;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\RecentRawContract;

/**
 * The data/obs end-points are used to fetch observations submitted to eBird in checklists. There are two categories of end-point: 1. Fetch observations for a specific country, region or location. 2. Fetch observations for nearby locations - up to a distance of 50km. Each end-point supports optional query parameters which allow you to filter the list of observations returned.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class RecentRawService implements RecentRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of recent observations (up to 30 days ago) of birds seen
     * at locations within a radius of up to 50 kilometers, from a given set
     * of coordinates. Results include only the most recent observation for each species in the region specified.
     *
     * @param array{
     *   lat: float,
     *   lng: float,
     *   back?: int,
     *   cat?: Cat|value-of<Cat>,
     *   dist?: int,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   sort?: Sort|value-of<Sort>,
     *   sppLocale?: string,
     * }|RecentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        array|RecentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'data/obs/geo/recent',
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
