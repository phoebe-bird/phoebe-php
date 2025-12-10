<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Ebird\EbirdGetResponseItem;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams;
use Phoebe\RequestOptions;

interface EbirdRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|EbirdRetrieveParams $params
     *
     * @return BaseResponse<list<EbirdGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        array|EbirdRetrieveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
