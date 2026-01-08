<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Locales\LocaleListParams;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface LocalesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LocaleListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<LocaleListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|LocaleListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
