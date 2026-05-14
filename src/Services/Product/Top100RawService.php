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
use Phoebe\ServiceContracts\Product\Top100RawContract;

/**
 * The product end-points make it easy to get the information shown in various pages on the eBird web site: 1. The Top 100 contributors on a given date. 2. The checklists submitted on a given date. 3. The most recent checklists submitted. 4. A summary of the checklists submitted on a given date. 5. The details and all the observations of a checklist.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class Top100RawService implements Top100RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the top 100 contributors on a given date for a country or region.
     *
     * @param int $d path param: The day in the month
     * @param array{
     *   regionCode: string,
     *   y: int,
     *   m: int,
     *   maxResults?: int,
     *   rankedBy?: RankedBy|value-of<RankedBy>,
     * }|Top100RetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Top100GetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|Top100RetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['product/top100/%1$s/%2$s/%3$s/%4$s', $regionCode, $y, $m, $d],
            query: $parsed,
            options: $options,
            convert: new ListOf(Top100GetResponseItem::class),
        );
    }
}
