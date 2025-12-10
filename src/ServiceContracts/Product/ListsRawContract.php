<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\ListGetResponseItem;
use Phoebe\Product\Lists\ListRetrieveParams;
use Phoebe\RequestOptions;

interface ListsRawContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param array<mixed>|ListRetrieveParams $params
     *
     * @return BaseResponse<list<ListGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|ListRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
