<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\FormsContract;

final class FormsService implements FormsContract
{
    /**
     * @api
     */
    public FormsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FormsRawService($client);
    }

    /**
     * @api
     *
     * For a species, get the list of subspecies recognised in the taxonomy. The results include the species that was passed in.
     *
     * @param string $speciesCode the eBird species code
     *
     * @return list<string>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($speciesCode, requestOptions: $requestOptions);

        return $response->parse();
    }
}
