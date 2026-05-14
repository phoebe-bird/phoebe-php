<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Hotspot;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface GeoRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GeoRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<GeoGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GeoRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
