<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Lists\ListGetResponseItem;
use Phoebe\Product\Lists\ListRetrieveParams;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\ListsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class ListsRawService implements ListsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get information on the most recently submitted checklists for a region.
     *
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param array{maxResults?: int}|ListRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ListGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|ListRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['product/lists/%1$s', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(ListGetResponseItem::class),
        );
    }
}
