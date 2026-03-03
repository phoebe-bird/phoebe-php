<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Hotspot\HotspotListParams\Fmt;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\HotspotContract;
use Phoebe\Services\Ref\Hotspot\GeoService;
use Phoebe\Services\Ref\Hotspot\InfoService;

/**
 * With the ref/hotspot end-points you can find the hotspots for a given country or region or nearby hotspots.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class HotspotService implements HotspotContract
{
    /**
     * @api
     */
    public HotspotRawService $raw;

    /**
     * @api
     */
    public GeoService $geo;

    /**
     * @api
     */
    public InfoService $info;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new HotspotRawService($client);
        $this->geo = new GeoService($client);
        $this->info = new InfoService($client);
    }

    /**
     * @api
     *
     * Hotspots in a region
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param int $back the number of days back to fetch hotspots
     * @param Fmt|value-of<Fmt> $fmt fetch the records in CSV or JSON format
     * @param RequestOpts|null $requestOptions
     *
     * @return list<HotspotListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?int $back = null,
        Fmt|string $fmt = 'json',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['back' => $back, 'fmt' => $fmt]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($regionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
