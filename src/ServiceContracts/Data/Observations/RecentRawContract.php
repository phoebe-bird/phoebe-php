<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\RecentListParams;
use Phoebe\RequestOptions;

interface RecentRawContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param array<mixed>|RecentListParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|RecentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
