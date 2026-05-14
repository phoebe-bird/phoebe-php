<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Ebird\EbirdGetResponseItem;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface EbirdRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EbirdRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<EbirdGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        array|EbirdRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
