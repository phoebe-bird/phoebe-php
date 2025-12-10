<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Versions\VersionListResponseItem;
use Phoebe\RequestOptions;

interface VersionsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<list<VersionListResponseItem>>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;
}
