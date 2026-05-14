<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Stats\StatGetResponse;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface StatsContract
{
    /**
     * @api
     *
     * @param int $d the day in the month
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $y the year, from 1800 to the present
     * @param int $m the month, from 1-12
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        string $regionCode,
        int $y,
        int $m,
        RequestOptions|array|null $requestOptions = null,
    ): StatGetResponse;
}
