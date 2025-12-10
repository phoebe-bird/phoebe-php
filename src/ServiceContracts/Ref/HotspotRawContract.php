<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;

interface HotspotRawContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param array<mixed>|HotspotListParams $params
     *
     * @return BaseResponse<list<HotspotListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|HotspotListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
