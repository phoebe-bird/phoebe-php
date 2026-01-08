<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface LocalesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<LocaleListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?string $acceptLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
