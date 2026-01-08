<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Versions\VersionListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface VersionsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<VersionListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;
}
