<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Adjacent\AdjacentListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface AdjacentContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param RequestOpts|null $requestOptions
     *
     * @return list<AdjacentListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        RequestOptions|array|null $requestOptions = null
    ): array;
}
