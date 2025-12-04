<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Checklist\ChecklistViewResponse;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\ChecklistContract;

final class ChecklistService implements ChecklistContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the details and observations of a checklist.
     * #### Notes Do NOT use this to download large amounts of data. You will be banned if you do. In the fields for each observation, the following fields are duplicates or obsolete and will be removed at a future date: *howManyAtleast*, *howManyAtmost*, *hideFlags*, *projId*, *subId*, *subnational1Code* and *present*.
     *
     * @throws APIException
     */
    public function view(
        string $subID,
        ?RequestOptions $requestOptions = null
    ): ChecklistViewResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['product/checklist/view/%1$s', $subID],
            options: $requestOptions,
            convert: ChecklistViewResponse::class,
        );
    }
}
