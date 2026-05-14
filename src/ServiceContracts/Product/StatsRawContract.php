<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Stats\StatGetResponse;
use Phoebe\Product\Stats\StatRetrieveParams;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface StatsRawContract
{
    /**
     * @api
     *
     * @param int $d the day in the month
     * @param array<string,mixed>|StatRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StatGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|StatRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
