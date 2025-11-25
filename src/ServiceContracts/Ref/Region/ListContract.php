<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Region;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\List\ListListParams;
use Phoebe\Ref\Region\List\ListListResponseItem;
use Phoebe\RequestOptions;

interface ListContract
{
    /**
     * @api
     *
     * @param array<mixed>|ListListParams $params
     *
     * @return list<ListListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $parentRegionCode,
        array|ListListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
