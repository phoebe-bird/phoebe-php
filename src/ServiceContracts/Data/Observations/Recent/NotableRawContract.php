<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams;
use Phoebe\RequestOptions;

interface NotableRawContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param array<string,mixed>|NotableListParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|NotableListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
