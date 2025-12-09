<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Top100\Top100GetResponseItem;
use Phoebe\Product\Top100\Top100RetrieveParams;
use Phoebe\Product\Top100\Top100RetrieveParams\RankedBy;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\Top100Contract;

final class Top100Service implements Top100Contract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the top 100 contributors on a given date for a country or region.
     *
     * @param array{
     *   regionCode: string,
     *   y: int,
     *   m: int,
     *   maxResults?: int,
     *   rankedBy?: 'spp'|'cl'|RankedBy,
     * }|Top100RetrieveParams $params
     *
     * @return list<Top100GetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|Top100RetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = Top100RetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regionCode = $parsed['regionCode'];
        unset($parsed['regionCode']);
        $y = $parsed['y'];
        unset($parsed['y']);
        $m = $parsed['m'];
        unset($parsed['m']);

        /** @var BaseResponse<list<Top100GetResponseItem>> */
        $response = $this->client->request(
            method: 'get',
            path: ['product/top100/%1$s/%2$s/%3$s/%4$s', $regionCode, $y, $m, $d],
            query: $parsed,
            options: $options,
            convert: new ListOf(Top100GetResponseItem::class),
        );

        return $response->parse();
    }
}
