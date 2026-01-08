<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Product;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Checklist\ChecklistViewResponse;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface ChecklistContract
{
    /**
     * @api
     *
     * @param string $subID the checklist identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function view(
        string $subID,
        RequestOptions|array|null $requestOptions = null
    ): ChecklistViewResponse;
}
