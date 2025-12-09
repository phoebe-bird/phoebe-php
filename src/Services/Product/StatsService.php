<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Product\Stats\StatGetResponse;
use Phoebe\Product\Stats\StatRetrieveParams;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\StatsContract;

final class StatsService implements StatsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a summary of the number of checklist submitted, species seen and contributors on a given date for a country or region.
     * #### Notes The results are updated every 15 minutes.
     *
     * @param array{regionCode: string, y: int, m: int}|StatRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        array|StatRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): StatGetResponse {
        [$parsed, $options] = StatRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regionCode = $parsed['regionCode'];
        unset($parsed['regionCode']);
        $y = $parsed['y'];
        unset($parsed['y']);
        $m = $parsed['m'];
        unset($parsed['m']);

        /** @var BaseResponse<StatGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['product/stats/%1$s/%2$s/%3$s/%4$s', $regionCode, $y, $m, $d],
            options: $options,
            convert: StatGetResponse::class,
        );

        return $response->parse();
    }
}
