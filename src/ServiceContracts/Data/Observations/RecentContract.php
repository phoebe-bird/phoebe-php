<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\RecentListParams;
use Phoebe\RequestOptions;

interface RecentContract
{
    /**
     * @api
     *
     * @param array<mixed>|RecentListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|RecentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
