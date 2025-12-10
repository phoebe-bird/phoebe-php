<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;

interface SpeciesListRawContract
{
    /**
     * @api
     *
     * @param string $regionCode Any location, USFWS region, subnational2, subnational1, country, or custom region code
     *
     * @return BaseResponse<list<string>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
