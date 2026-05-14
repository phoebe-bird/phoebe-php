<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Versions\VersionListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\VersionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class VersionsRawService implements VersionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of all versions of the taxonomy, with a flag indicating which is the latest.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<VersionListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ref/taxonomy/versions',
            options: $requestOptions,
            convert: new ListOf(VersionListResponseItem::class),
        );
    }
}
