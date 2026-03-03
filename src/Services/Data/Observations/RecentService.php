<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\RecentListParams\Cat;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\RecentContract;
use Phoebe\Services\Data\Observations\Recent\HistoricService;
use Phoebe\Services\Data\Observations\Recent\NotableService;
use Phoebe\Services\Data\Observations\Recent\SpeciesService;

/**
 * The data/obs end-points are used to fetch observations submitted to eBird in checklists. There are two categories of end-point: 1. Fetch observations for a specific country, region or location. 2. Fetch observations for nearby locations - up to a distance of 50km. Each end-point supports optional query parameters which allow you to filter the list of observations returned.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class RecentService implements RecentContract
{
    /**
     * @api
     */
    public RecentRawService $raw;

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
        $this->raw = new RecentRawService($client);
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
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $back the number of days back to fetch observations
     * @param Cat|value-of<Cat> $cat Only fetch observations from these taxonomic categories
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional Include observations which have not yet been reviewed
     * @param int $maxResults Only fetch this number of observations
     * @param list<string> $r Fetch observations from up to 10 locations
     * @param string $sppLocale Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        int $back = 14,
        Cat|string|null $cat = null,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        ?array $r = null,
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'back' => $back,
                'cat' => $cat,
                'hotspot' => $hotspot,
                'includeProvisional' => $includeProvisional,
                'maxResults' => $maxResults,
                'r' => $r,
                'sppLocale' => $sppLocale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($regionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
