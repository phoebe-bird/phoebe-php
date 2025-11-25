<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Hotspot;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams;
use Phoebe\RequestOptions;

interface GeoContract
{
    /**
     * @api
     *
     * @param array<mixed>|GeoRetrieveParams $params
     *
     * @return list<GeoGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GeoRetrieveParams $params,
        ?RequestOptions $requestOptions = null
    ): array;
}
