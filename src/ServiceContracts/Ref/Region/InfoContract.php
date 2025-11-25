<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Info\InfoGetResponse;
use Phoebe\Ref\Region\Info\InfoRetrieveParams;
use Phoebe\RequestOptions;

interface InfoContract
{
    /**
     * @api
     *
     * @param array<mixed>|InfoRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|InfoRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InfoGetResponse;
}
