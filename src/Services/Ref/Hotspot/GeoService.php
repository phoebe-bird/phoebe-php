<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Hotspot;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Hotspot\Geo\GeoGetResponseItem;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams\Fmt;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Hotspot\GeoContract;

/**
 * With the ref/hotspot end-points you can find the hotspots for a given country or region or nearby hotspots.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class GeoService implements GeoContract
{
    /**
     * @api
     */
    public GeoRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GeoRawService($client);
    }

    /**
     * @api
     *
     * Get the list of hotspots, within a radius of up to 50 kilometers, from a given set of coordinates.
     *
     * @param int $back the number of days back to fetch hotspots
     * @param int $dist the search radius from the given position, in kilometers
     * @param Fmt|value-of<Fmt> $fmt fetch the records in CSV or JSON format
     * @param RequestOpts|null $requestOptions
     *
     * @return list<GeoGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        float $lat,
        float $lng,
        ?int $back = null,
        int $dist = 25,
        Fmt|string $fmt = 'json',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'lat' => $lat,
                'lng' => $lng,
                'back' => $back,
                'dist' => $dist,
                'fmt' => $fmt,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
