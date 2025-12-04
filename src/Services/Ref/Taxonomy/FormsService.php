<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\FormsContract;

final class FormsService implements FormsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * For a species, get the list of subspecies recognised in the taxonomy. The results include the species that was passed in.
     *
     * @return list<string>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/taxon/forms/%1$s', $speciesCode],
            options: $requestOptions,
            convert: new ListOf('string'),
        );
    }
}
