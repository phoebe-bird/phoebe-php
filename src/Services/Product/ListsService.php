<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Product\Lists\ListGetResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\ListsContract;
use Phoebe\Services\Product\Lists\HistoricalService;

/**
 * The data/obs end-points are used to fetch observations submitted to eBird in checklists. There are two categories of end-point: 1. Fetch observations for a specific country, region or location. 2. Fetch observations for nearby locations - up to a distance of 50km. Each end-point supports optional query parameters which allow you to filter the list of observations returned.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public ListsRawService $raw;

    /**
     * @api
     */
    public HistoricalService $historical;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListsRawService($client);
        $this->historical = new HistoricalService($client);
    }

    /**
     * @api
     *
     * Get information on the most recently submitted checklists for a region.
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $maxResults only fetch this number of checklists
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ListGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        int $maxResults = 10,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['maxResults' => $maxResults]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($regionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
