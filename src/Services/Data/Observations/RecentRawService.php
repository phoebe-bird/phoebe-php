<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\RecentListParams;
use Phoebe\Data\Observations\Recent\RecentListParams\Cat;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\RecentRawContract;

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
     * in a country, state, county, or location. Results include only the most recent observation for each species in the region specified.
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param array{
     *   back?: int,
     *   cat?: 'species'|'slash'|'issf'|'spuh'|'hybrid'|'domestic'|'form'|'intergrade'|Cat,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   r?: list<string>,
     *   sppLocale?: string,
     * }|RecentListParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|RecentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['data/obs/%1$s/recent', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
