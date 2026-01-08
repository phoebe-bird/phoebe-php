<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface FormsContract
{
    /**
     * @api
     *
     * @param string $speciesCode the eBird species code
     * @param RequestOpts|null $requestOptions
     *
     * @return list<string>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        RequestOptions|array|null $requestOptions = null
    ): array;
}
