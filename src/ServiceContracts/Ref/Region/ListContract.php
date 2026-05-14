<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\List_\ListListParams\Fmt;
use Phoebe\Ref\Region\List_\ListListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface ListContract
{
    /**
     * @api
     *
     * @param string $parentRegionCode path param: The country or subnational1 code, or 'world'
     * @param string $regionType path param: The region type: 'country', 'subnational1' or 'subnational2'
     * @param Fmt|value-of<Fmt> $fmt query param: Fetch the records in CSV or JSON format
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ListListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $parentRegionCode,
        string $regionType,
        Fmt|string $fmt = 'json',
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
