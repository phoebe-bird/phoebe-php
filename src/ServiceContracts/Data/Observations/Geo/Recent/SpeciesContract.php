<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Geo\Recent;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Geo\Recent\Species\SpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

interface SpeciesContract
{
    /**
     * @api
     *
     * @param array<mixed>|SpecieListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|SpecieListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
