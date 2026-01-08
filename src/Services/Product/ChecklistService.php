<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Checklist\ChecklistViewResponse;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\ChecklistContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class ChecklistService implements ChecklistContract
{
    /**
     * @api
     */
    public ChecklistRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChecklistRawService($client);
    }

    /**
     * @api
     *
     * Get the details and observations of a checklist.
     * #### Notes Do NOT use this to download large amounts of data. You will be banned if you do. In the fields for each observation, the following fields are duplicates or obsolete and will be removed at a future date: *howManyAtleast*, *howManyAtmost*, *hideFlags*, *projId*, *subId*, *subnational1Code* and *present*.
     *
     * @param string $subID the checklist identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function view(
        string $subID,
        RequestOptions|array|null $requestOptions = null
    ): ChecklistViewResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->view($subID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
