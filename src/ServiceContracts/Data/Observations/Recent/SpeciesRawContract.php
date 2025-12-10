<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Recent;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Species\SpecieRetrieveParams;
use Phoebe\RequestOptions;

interface SpeciesRawContract
{
    /**
     * @api
     *
     * @param string $speciesCode path param: The eBird species code
     * @param array<mixed>|SpecieRetrieveParams $params
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function retrieve(
        string $speciesCode,
        array|SpecieRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
