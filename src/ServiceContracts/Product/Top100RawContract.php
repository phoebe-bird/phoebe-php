<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Top100\Top100GetResponseItem;
use Phoebe\Product\Top100\Top100RetrieveParams;
use Phoebe\RequestOptions;

interface Top100RawContract
{
    /**
     * @api
     *
     * @param int $d path param: The day in the month
     * @param array<string,mixed>|Top100RetrieveParams $params
     *
     * @return BaseResponse<list<Top100GetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|Top100RetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
