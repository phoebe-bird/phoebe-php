<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams;
use Phoebe\RequestOptions;

interface NotableContract
{
    /**
     * @api
     *
     * @param array<mixed>|NotableListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|NotableListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
