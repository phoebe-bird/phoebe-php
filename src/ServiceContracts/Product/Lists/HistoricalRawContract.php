<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product\Lists;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem;
use Phoebe\Product\Lists\Historical\HistoricalRetrieveParams;
use Phoebe\RequestOptions;

interface HistoricalRawContract
{
    /**
     * @api
     *
     * @param int $d path param: The day in the month
     * @param array<mixed>|HistoricalRetrieveParams $params
     *
     * @return BaseResponse<list<HistoricalGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|HistoricalRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
