<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo\Recent;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

interface NotableRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NotableListParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        array|NotableListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
