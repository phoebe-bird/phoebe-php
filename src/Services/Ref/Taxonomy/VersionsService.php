<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Versions\VersionListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\VersionsContract;

final class VersionsService implements VersionsContract
{
    /**
     * @api
     */
    public VersionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VersionsRawService($client);
    }

    /**
     * @api
     *
     * Returns a list of all versions of the taxonomy, with a flag indicating which is the latest.
     *
     * @return list<VersionListResponseItem>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
