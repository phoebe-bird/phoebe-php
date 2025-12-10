<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Info\InfoGetResponse;
use Phoebe\Ref\Region\Info\InfoRetrieveParams\RegionNameFormat;
use Phoebe\RequestOptions;

interface InfoContract
{
    /**
     * @api
     *
     * @param string $regionCode The major region, country, subnational1 or subnational2 code, or locId
     * @param string $delim the characters used to separate elements in the name
     * @param 'detailed'|'detailednoqual'|'full'|'namequal'|'nameonly'|'revdetailed'|RegionNameFormat $regionNameFormat control how the name is displayed
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        string $delim = ', ',
        string|RegionNameFormat $regionNameFormat = 'full',
        ?RequestOptions $requestOptions = null,
    ): InfoGetResponse;
}
