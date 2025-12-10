<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Hotspot;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams\Fmt;
use Phoebe\RequestOptions;

interface GeoContract
{
    /**
     * @api
     *
     * @param int $back the number of days back to fetch hotspots
     * @param int $dist the search radius from the given position, in kilometers
     * @param 'csv'|'json'|Fmt $fmt fetch the records in CSV or JSON format
     *
     * @return list<GeoGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        float $lat,
        float $lng,
        ?int $back = null,
        int $dist = 25,
        string|Fmt $fmt = 'json',
        ?RequestOptions $requestOptions = null,
    ): array;
}
