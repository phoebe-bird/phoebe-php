<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams\SpeciesGrouping;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListResponseItem;
use Phoebe\RequestOptions;

interface SpeciesGroupsContract
{
    /**
     * @api
     *
     * @param SpeciesGrouping|value-of<SpeciesGrouping> $speciesGrouping the order in which groups are returned
     * @param string $groupNameLocale Locale for species group names. English names are returned for any non-listed locale or any non-translated group name.
     *
     * @return list<SpeciesGroupListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        SpeciesGrouping|string $speciesGrouping,
        string $groupNameLocale = 'en',
        ?RequestOptions $requestOptions = null,
    ): array;
}
