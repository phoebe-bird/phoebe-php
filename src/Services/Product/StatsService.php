<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Product\Stats\StatGetResponse;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\StatsContract;

final class StatsService implements StatsContract
{
    /**
     * @api
     */
    public StatsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StatsRawService($client);
    }

    /**
     * @api
     *
     * Get a summary of the number of checklist submitted, species seen and contributors on a given date for a country or region.
     * #### Notes The results are updated every 15 minutes.
     *
     * @param int $d the day in the month
     * @param string $regionCode the country, subnational1, subnational2 or location code
     * @param int $y the year, from 1800 to the present
     * @param int $m the month, from 1-12
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        string $regionCode,
        int $y,
        int $m,
        ?RequestOptions $requestOptions = null,
    ): StatGetResponse {
        $params = Util::removeNulls(
            ['regionCode' => $regionCode, 'y' => $y, 'm' => $m]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($d, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
