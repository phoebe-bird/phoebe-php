<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\List\ListListParams;
use Phoebe\Ref\Region\List\ListListResponseItem;
use Phoebe\RequestOptions;

interface ListRawContract
{
    /**
     * @api
     *
     * @param string $parentRegionCode path param: The country or subnational1 code, or 'world'
     * @param array<mixed>|ListListParams $params
     *
     * @return BaseResponse<list<ListListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $parentRegionCode,
        array|ListListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
