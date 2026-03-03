<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo\Recent;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams;
use Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams\Detail;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\Recent\NotableRawContract;

/**
 * The data/obs end-points are used to fetch observations submitted to eBird in checklists. There are two categories of end-point: 1. Fetch observations for a specific country, region or location. 2. Fetch observations for nearby locations - up to a distance of 50km. Each end-point supports optional query parameters which allow you to filter the list of observations returned.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class NotableRawService implements NotableRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of notable observations (up to 30 days ago) of birds seen at locations within a radius of up to 50 kilometers, from a given set of coordinates. Notable observations can be for locally or nationally rare species or are otherwise unusual, for example over-wintering birds in a species which is normally only a summer visitor.
     *
     * @param array{
     *   lat: float,
     *   lng: float,
     *   back?: int,
     *   detail?: Detail|value-of<Detail>,
     *   dist?: int,
     *   hotspot?: bool,
     *   maxResults?: int,
     *   sppLocale?: string,
     * }|NotableListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        array|NotableListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotableListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'data/obs/geo/recent/notable',
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
