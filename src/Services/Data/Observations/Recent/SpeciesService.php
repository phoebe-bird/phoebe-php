<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Recent;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Recent\SpeciesContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class SpeciesService implements SpeciesContract
{
    /**
     * @api
     */
    public SpeciesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeciesRawService($client);
    }

    /**
     * @api
     *
     * Get the recent observations, up to 30 days ago, of a particular species
     * in a country, region or location. Results include only the most recent observation from each location in the region specified.
     * #### Notes
     *
     * The species code is typically a 6-letter code, e.g. cangoo for Canada Goose. You can
     * get complete set of species code from the GET eBird Taxonomy end-point.
     *
     * When using the *r* query parameter set the *regionCode* URL parameter to an empty string.
     *
     * @param string $speciesCode path param: The eBird species code
     * @param string $regionCode path param: The country, subnational1, subnational2 or location code
     * @param int $back query param: The number of days back to fetch observations
     * @param bool $hotspot Query param: Only fetch observations from hotspots
     * @param bool $includeProvisional query param: Include observations which have not yet been reviewed
     * @param int $maxResults Query param: Only fetch this number of observations
     * @param list<string> $r Query param: Fetch observations from up to 10 locations
     * @param string $sppLocale Query param: Use this language for species common names
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function retrieve(
        string $speciesCode,
        string $regionCode,
        int $back = 14,
        bool $hotspot = false,
        bool $includeProvisional = false,
        int $maxResults = 10000,
        ?array $r = null,
        string $sppLocale = 'en',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'regionCode' => $regionCode,
                'back' => $back,
                'hotspot' => $hotspot,
                'includeProvisional' => $includeProvisional,
                'maxResults' => $maxResults,
                'r' => $r,
                'sppLocale' => $sppLocale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($speciesCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
