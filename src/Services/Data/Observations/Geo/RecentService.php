<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Geo;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Cat;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Sort;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Geo\RecentContract;
use Phoebe\Services\Data\Observations\Geo\Recent\NotableService;
use Phoebe\Services\Data\Observations\Geo\Recent\SpeciesService;

/**
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
        $this->raw = new RecentRawService($client);
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
     * @param int $back the number of days back to fetch observations
     * @param Cat|value-of<Cat> $cat Only fetch observations from these taxonomic categories
     * @param int $dist the search radius from the given position, in kilometers
     * @param bool $hotspot Only fetch observations from hotspots
     * @param bool $includeProvisional include observations which have not yet been reviewed
     * @param int $maxResults Only fetch this number of observations
     * @param Sort|value-of<Sort> $sort sort observations by taxonomy or by date, most recent first
     * @param string $sppLocale Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        float $lat,
        float $lng,
        int $back = 14,
        Cat|string|null $cat = null,
        int $dist = 25,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        Sort|string $sort = 'date',
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'lat' => $lat,
                'lng' => $lng,
                'back' => $back,
                'cat' => $cat,
                'dist' => $dist,
                'hotspot' => $hotspot,
                'includeProvisional' => $includeProvisional,
                'maxResults' => $maxResults,
                'sort' => $sort,
                'sppLocale' => $sppLocale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
