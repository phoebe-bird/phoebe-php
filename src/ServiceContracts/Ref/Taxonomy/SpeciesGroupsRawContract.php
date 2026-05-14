<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams\SpeciesGrouping;
use Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListResponseItem;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface SpeciesGroupsRawContract
{
    /**
     * @api
     *
     * @param SpeciesGrouping|string $speciesGrouping the order in which groups are returned
     * @param array<string,mixed>|SpeciesGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<SpeciesGroupListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        SpeciesGrouping|string $speciesGrouping,
        array|SpeciesGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
