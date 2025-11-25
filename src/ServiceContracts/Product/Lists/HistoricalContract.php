<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product\Lists;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\Historical\HistoricalGetResponseItem;
use Phoebe\Product\Lists\Historical\HistoricalRetrieveParams;
use Phoebe\RequestOptions;

interface HistoricalContract
{
    /**
     * @api
     *
     * @param array<mixed>|HistoricalRetrieveParams $params
     *
     * @return list<HistoricalGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|HistoricalRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
