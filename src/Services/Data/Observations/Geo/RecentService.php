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
use Phoebe\ServiceContracts\Data\Observations\Geo\RecentContract;
use Phoebe\Services\Data\Observations\Geo\Recent\NotableService;
use Phoebe\Services\Data\Observations\Geo\Recent\SpeciesService;

final class RecentService implements RecentContract
{
    /**
     * @api
     */
    public SpeciesService $species;

    /**
     * @api
     */
    public NotableService $notable;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->species = new SpeciesService($client);
        $this->notable = new NotableService($client);
    }

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
     *   cat?: 'species'|'slash'|'issf'|'spuh'|'hybrid'|'domestic'|'form'|'intergrade'|Cat,
     *   dist?: int,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   sort?: 'date'|'species'|Sort,
     *   sppLocale?: string,
     * }|RecentListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        array|RecentListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = RecentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<list<Observation>> */
        $response = $this->client->request(
            method: 'get',
            path: 'data/obs/geo/recent',
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );

        return $response->parse();
    }
}
