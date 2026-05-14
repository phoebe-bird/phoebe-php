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
 * The data/obs end-points are used to fetch observations submitted to eBird in checklists. There are two categories of end-point: 1. Fetch observations for a specific country, region or location. 2. Fetch observations for nearby locations - up to a distance of 50km. Each end-point supports optional query parameters which allow you to filter the list of observations returned.
 *
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
