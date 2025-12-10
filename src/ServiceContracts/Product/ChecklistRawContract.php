<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Checklist\ChecklistViewResponse;
use Phoebe\RequestOptions;

interface ChecklistRawContract
{
    /**
     * @api
     *
     * @param string $subID the checklist identifier
     *
     * @return BaseResponse<ChecklistViewResponse>
     *
     * @throws APIException
     */
    public function view(
        string $subID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
