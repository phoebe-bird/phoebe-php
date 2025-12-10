<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;

interface LocalesContract
{
    /**
     * @api
     *
     * @return list<LocaleListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?string $acceptLanguage = null,
        ?RequestOptions $requestOptions = null
    ): array;
}
