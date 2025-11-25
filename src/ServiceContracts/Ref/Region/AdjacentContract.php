<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Adjacent\AdjacentListResponseItem;
use Phoebe\RequestOptions;

interface AdjacentContract
{
    /**
     * @api
     *
     * @return list<AdjacentListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?RequestOptions $requestOptions = null
    ): array;
}
