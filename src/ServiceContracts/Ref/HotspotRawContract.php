<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface HotspotRawContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param array<string,mixed>|HotspotListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<HotspotListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|HotspotListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
