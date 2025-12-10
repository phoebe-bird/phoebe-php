<?php

declare(strict_types=1);

namespace Phoebe\Services\Product\Lists;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem;
use Phoebe\Product\Lists\Historical\HistoricalRetrieveParams\SortKey;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\Lists\HistoricalContract;

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
     * @param 'obs_dt'|'creation_dt'|SortKey $sortKey query param: Order the results by the date of the checklist or by the date it was submitted
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
        string|SortKey $sortKey = 'obs_dt',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'regionCode' => $regionCode,
            'y' => $y,
            'm' => $m,
            'maxResults' => $maxResults,
            'sortKey' => $sortKey,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($d, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
