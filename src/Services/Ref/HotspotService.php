<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\HotspotListParams;
use Phoebe\Ref\Hotspot\HotspotListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\HotspotContract;
use Phoebe\Services\Ref\Hotspot\GeoService;
use Phoebe\Services\Ref\Hotspot\InfoService;

final class HotspotService implements HotspotContract
{
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
        $this->geo = new GeoService($client);
        $this->info = new InfoService($client);
    }

    /**
     * @api
     *
     * Hotspots in a region
     *
     * @param array{back?: int, fmt?: "csv"|"json"}|HotspotListParams $params
     *
     * @return list<HotspotListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        array|HotspotListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = HotspotListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ref/hotspot/%1$s', $regionCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(HotspotListResponseItem::class),
        );
    }
}
