<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Top100\Top100GetResponseItem;
use Phoebe\Product\Top100\Top100RetrieveParams;
use Phoebe\RequestOptions;

interface Top100Contract
{
    /**
     * @api
     *
     * @param array<mixed>|Top100RetrieveParams $params
     *
     * @return list<Top100GetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|Top100RetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
