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
use Phoebe\ServiceContracts\Data\Observations\RecentContract;
use Phoebe\Services\Data\Observations\Recent\HistoricService;
use Phoebe\Services\Data\Observations\Recent\NotableService;
use Phoebe\Services\Data\Observations\Recent\SpeciesService;

final class RecentService implements RecentContract
{
    /**
     * @api
     */
    public NotableService $notable;

    /**
     * @api
     */
    public SpeciesService $species;

    /**
     * @api
     */
    public HistoricService $historic;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->notable = new NotableService($client);
        $this->species = new SpeciesService($client);
        $this->historic = new HistoricService($client);
    }

    /**
     * @api
     *
     * Get the list of recent observations (up to 30 days ago) of birds seen
     * in a country, state, county, or location. Results include only the most recent observation for each species in the region specified.
     *
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
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|RecentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = RecentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<list<Observation>> */
        $response = $this->client->request(
            method: 'get',
            path: ['data/obs/%1$s/recent', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );

        return $response->parse();
    }
}
