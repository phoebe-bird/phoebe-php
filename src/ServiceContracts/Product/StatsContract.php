<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Stats\StatGetResponse;
use Phoebe\Product\Stats\StatRetrieveParams;
use Phoebe\RequestOptions;

interface StatsContract
{
    /**
     * @api
     *
     * @param array<mixed>|StatRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|StatRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): StatGetResponse;
}
