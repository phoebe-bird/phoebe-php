<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;

interface HotspotContract
{
    /**
     * @api
     *
     * @param array<mixed>|HotspotListParams $params
     *
     * @return list<HotspotListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|HotspotListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
