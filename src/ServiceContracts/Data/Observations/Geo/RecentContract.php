<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams;
use Phoebe\Data\Observations\Observation;
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
        array|RecentListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;
}
