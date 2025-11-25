<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams\SpeciesGrouping;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListResponseItem;
use Phoebe\RequestOptions;

interface SpeciesGroupsContract
{
    /**
     * @api
     *
     * @param SpeciesGrouping|value-of<SpeciesGrouping> $speciesGrouping
     * @param array<mixed>|SpeciesGroupListParams $params
     *
     * @return list<SpeciesGroupListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        SpeciesGrouping|string $speciesGrouping,
        array|SpeciesGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
