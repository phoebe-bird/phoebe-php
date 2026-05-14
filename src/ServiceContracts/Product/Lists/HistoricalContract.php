<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product\Lists;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem;
use Phoebe\Product\Lists\Historical\HistoricalRetrieveParams\SortKey;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface HistoricalContract
{
    /**
     * @api
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
    ): array;
}
