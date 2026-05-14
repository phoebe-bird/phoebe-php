<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Info\InfoGetResponse;
use Phoebe\Ref\Region\Info\InfoRetrieveParams;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface InfoRawContract
{
    /**
     * @api
     *
     * @param string $regionCode The major region, country, subnational1 or subnational2 code, or locId
     * @param array<string,mixed>|InfoRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfoGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|InfoRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
