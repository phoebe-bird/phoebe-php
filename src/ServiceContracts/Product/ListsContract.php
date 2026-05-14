<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\ListGetResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface ListsContract
{
    /**
     * @api
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
    ): array;
}
