<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams;
use Phoebe\Ref\Hotspot\HotspotListParams\Fmt;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\HotspotRawContract;

final class HotspotRawService implements HotspotRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Hotspots in a region
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param array{back?: int, fmt?: 'csv'|'json'|Fmt}|HotspotListParams $params
     *
     * @return BaseResponse<list<HotspotListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|HotspotListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = HotspotListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/hotspot/%1$s', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(HotspotListResponseItem::class),
        );
    }
}
