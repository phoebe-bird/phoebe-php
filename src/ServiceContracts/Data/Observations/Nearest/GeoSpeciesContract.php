<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Data\Observations\Nearest;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Nearest\GeoSpecies\GeoSpecieListParams;
use Phoebe\Data\Observations\Observation;
use Phoebe\RequestOptions;

interface GeoSpeciesContract
{
    /**
     * @api
     *
     * @param array<mixed>|GeoSpecieListParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        array|GeoSpecieListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
