<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface FormsRawContract
{
    /**
     * @api
     *
     * @param string $speciesCode the eBird species code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<string>>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
