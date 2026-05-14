<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams\Fmt;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface HotspotContract
{
    /**
     * @api
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param int $back the number of days back to fetch hotspots
     * @param Fmt|value-of<Fmt> $fmt fetch the records in CSV or JSON format
     * @param RequestOpts|null $requestOptions
     *
     * @return list<HotspotListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?int $back = null,
        Fmt|string $fmt = 'json',
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
