<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams;
use Phoebe\RequestOptions;

interface HistoricRawContract
{
    /**
     * @api
     *
     * @param int $d Path param:
     * @param array<string,mixed>|HistoricListParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        int $d,
        array|HistoricListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
