<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams;
use Phoebe\RequestOptions;

interface HistoricContract
{
    /**
     * @api
     *
     * @param array<mixed>|HistoricListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        int $d,
        array|HistoricListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
