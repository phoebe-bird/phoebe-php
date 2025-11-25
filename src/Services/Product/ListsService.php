<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\ListGetResponseItem;
use Phoebe\Product\Lists\ListRetrieveParams;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\ListsContract;
use Phoebe\Services\Product\Lists\HistoricalService;

final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public HistoricalService $historical;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->historical = new HistoricalService($client);
    }

    /**
     * @api
     *
     * Get information on the most recently submitted checklists for a region.
     *
     * @param array{maxResults?: int}|ListRetrieveParams $params
     *
     * @return list<ListGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|ListRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = ListRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['product/lists/%1$s', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(ListGetResponseItem::class),
        );
    }
}
