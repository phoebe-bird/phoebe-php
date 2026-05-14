<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Hotspot;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Info\InfoGetResponse;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface InfoContract
{
    /**
     * @api
     *
     * @param string $locID the location code
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $locID,
        RequestOptions|array|null $requestOptions = null
    ): InfoGetResponse;
}
