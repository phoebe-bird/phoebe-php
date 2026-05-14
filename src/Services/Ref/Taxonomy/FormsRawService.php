<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\FormsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class FormsRawService implements FormsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * For a species, get the list of subspecies recognised in the taxonomy. The results include the species that was passed in.
     *
     * @param string $speciesCode the eBird species code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<string>>
     *
     * @throws APIException
     */
    public function list(
        string $speciesCode,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/taxon/forms/%1$s', $speciesCode],
            options: $requestOptions,
            convert: new ListOf('string'),
        );
    }
}
