<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\ListGetResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\ListsContract;
use Phoebe\Services\Product\Lists\HistoricalService;

final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public ListsRawService $raw;

    /**
     * @api
     */
    public HistoricalService $historical;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListsRawService($client);
        $this->historical = new HistoricalService($client);
    }

    /**
     * @api
     *
     * Get information on the most recently submitted checklists for a region.
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $maxResults only fetch this number of checklists
     *
     * @return list<ListGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        int $maxResults = 10,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = ['maxResults' => $maxResults];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($regionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
