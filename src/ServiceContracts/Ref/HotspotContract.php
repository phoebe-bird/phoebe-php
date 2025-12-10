<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams\Fmt;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;

interface HotspotContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param int $back the number of days back to fetch hotspots
     * @param 'csv'|'json'|Fmt $fmt fetch the records in CSV or JSON format
     *
     * @return list<HotspotListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?int $back = null,
        string|Fmt $fmt = 'json',
        ?RequestOptions $requestOptions = null,
    ): array;
}
