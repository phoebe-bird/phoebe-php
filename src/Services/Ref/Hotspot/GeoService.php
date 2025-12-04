<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Hotspot;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Hotspot\GeoContract;

final class GeoService implements GeoContract
{
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
     *   lat: float, lng: float, back?: int, dist?: int, fmt?: 'csv'|'json'
     * }|GeoRetrieveParams $params
     *
     * @return list<GeoGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GeoRetrieveParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
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
