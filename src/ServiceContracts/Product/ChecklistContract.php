<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Checklist\ChecklistViewResponse;
use Phoebe\RequestOptions;

interface ChecklistContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function view(
        string $subID,
        ?RequestOptions $requestOptions = null
    ): ChecklistViewResponse;
}
