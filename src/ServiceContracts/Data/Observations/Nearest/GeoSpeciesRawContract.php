<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Nearest;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Nearest\GeoSpecies\GeoSpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface GeoSpeciesRawContract
{
    /**
     * @api
     *
     * @param string $speciesCode the eBird species code
     * @param array<string,mixed>|GeoSpecieListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Observation>>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|GeoSpecieListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
