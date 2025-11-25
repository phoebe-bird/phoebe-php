<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Locales\LocaleListParams;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;

interface LocalesContract
{
    /**
     * @api
     *
     * @param array<mixed>|LocaleListParams $params
     *
     * @return list<LocaleListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        array|LocaleListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;
}
