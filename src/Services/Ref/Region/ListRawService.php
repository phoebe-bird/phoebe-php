<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\List\ListListParams;
use Phoebe\Ref\Region\List\ListListParams\Fmt;
use Phoebe\Ref\Region\List\ListListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\ListRawContract;

final class ListRawService implements ListRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of sub-regions for a given country or region. #### Notes Not all combinations of region type and region code are valid. You can fetch all the subnational1 or subnational2 regions for a country however you can only specify a region type of 'country' when using 'world' as a region code.
     *
     * @param string $parentRegionCode path param: The country or subnational1 code, or 'world'
     * @param array{regionType: string, fmt?: 'csv'|'json'|Fmt}|ListListParams $params
     *
     * @return BaseResponse<list<ListListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $parentRegionCode,
        array|ListListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regionType = $parsed['regionType'];
        unset($parsed['regionType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/region/list/%1$s/%2$s', $regionType, $parentRegionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(ListListResponseItem::class),
        );
    }
}
