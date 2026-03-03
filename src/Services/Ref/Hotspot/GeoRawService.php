<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Hotspot;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams\Fmt;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Hotspot\GeoRawContract;

/**
 * With the ref/hotspot end-points you can find the hotspots for a given country or region or nearby hotspots.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class GeoRawService implements GeoRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of hotspots, within a radius of up to 50 kilometers, from a given set of coordinates.
     *
     * @param array{
     *   lat: float, lng: float, back?: int, dist?: int, fmt?: Fmt|value-of<Fmt>
     * }|GeoRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<GeoGetResponseItem>>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GeoRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GeoRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ref/hotspot/geo',
            query: $parsed,
            options: $options,
            convert: new ListOf(GeoGetResponseItem::class),
        );
    }
}
