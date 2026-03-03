<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\SpeciesListContract;

/**
 * The product end-points make it easy to get the information shown in various pages on the eBird web site: 1. The Top 100 contributors on a given date. 2. The checklists submitted on a given date. 3. The most recent checklists submitted. 4. A summary of the checklists submitted on a given date. 5. The details and all the observations of a checklist.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class SpeciesListService implements SpeciesListContract
{
    /**
     * @api
     */
    public SpeciesListRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeciesListRawService($client);
    }

    /**
     * @api
     *
     * Get a list of species codes ever seen in a region, in taxonomic order (species taxa only)
     * #### Notes The results are usually updated every 10 seconds for locations, every day for larger regions.
     *
     * @param string $regionCode Any location, USFWS region, subnational2, subnational1, country, or custom region code
     * @param RequestOpts|null $requestOptions
     *
     * @return list<string>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($regionCode, requestOptions: $requestOptions);

        return $response->parse();
    }
}
