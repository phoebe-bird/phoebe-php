<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Adjacent\AdjacentListResponseItem;
use Phoebe\RequestOptions;

interface AdjacentRawContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     *
     * @return BaseResponse<list<AdjacentListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
