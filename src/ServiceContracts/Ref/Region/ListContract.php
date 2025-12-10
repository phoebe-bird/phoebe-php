<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\List\ListListParams\Fmt;
use Phoebe\Ref\Region\List\ListListResponseItem;
use Phoebe\RequestOptions;

interface ListContract
{
    /**
     * @api
     *
     * @param string $parentRegionCode path param: The country or subnational1 code, or 'world'
     * @param string $regionType path param: The region type: 'country', 'subnational1' or 'subnational2'
     * @param 'csv'|'json'|Fmt $fmt query param: Fetch the records in CSV or JSON format
     *
     * @return list<ListListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $parentRegionCode,
        string $regionType,
        string|Fmt $fmt = 'json',
        ?RequestOptions $requestOptions = null,
    ): array;
}
