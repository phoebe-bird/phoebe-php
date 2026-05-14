<?php

declare(strict_types=1);

namespace Phoebe\Services\Product\Lists;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem;
use Phoebe\Product\Lists\Historical\HistoricalRetrieveParams\SortKey;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\Lists\HistoricalContract;

/**
 * The product end-points make it easy to get the information shown in various pages on the eBird web site: 1. The Top 100 contributors on a given date. 2. The checklists submitted on a given date. 3. The most recent checklists submitted. 4. A summary of the checklists submitted on a given date. 5. The details and all the observations of a checklist.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class HistoricalService implements HistoricalContract
{
    /**
     * @api
     */
    public HistoricalRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new HistoricalRawService($client);
    }

    /**
     * @api
     *
     * Get information on the checklists submitted on a given date for a country or region.
     *
     * @param int $d path param: The day in the month
     * @param string $regionCode path param: The country, subnational1, subnational2 or location code
     * @param int $y path param: The year, from 1800 to the present
     * @param int $m path param: The month, from 1-12
     * @param int $maxResults query param: Only fetch this number of checklists
     * @param SortKey|value-of<SortKey> $sortKey query param: Order the results by the date of the checklist or by the date it was submitted
     * @param RequestOpts|null $requestOptions
     *
     * @return list<HistoricalGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        string $regionCode,
        int $y,
        int $m,
        int $maxResults = 10,
        SortKey|string $sortKey = 'obs_dt',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'regionCode' => $regionCode,
                'y' => $y,
                'm' => $m,
                'maxResults' => $maxResults,
                'sortKey' => $sortKey,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($d, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
