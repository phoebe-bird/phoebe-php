<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Hotspot;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams;
use Phoebe\RequestOptions;

interface GeoRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GeoRetrieveParams $params
     *
     * @return BaseResponse<list<GeoGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GeoRetrieveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
