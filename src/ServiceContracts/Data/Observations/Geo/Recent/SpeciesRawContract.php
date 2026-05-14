<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo\Recent;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Species\SpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface SpeciesRawContract
{
    /**
     * @api
     *
     * @param string $speciesCode the eBird species code
     * @param array<string,mixed>|SpecieListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|SpecieListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
