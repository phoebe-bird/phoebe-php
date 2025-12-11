<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Product\Top100\Top100GetResponseItem;
use Phoebe\Product\Top100\Top100RetrieveParams\RankedBy;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\Top100Contract;

final class Top100Service implements Top100Contract
{
    /**
     * @api
     */
    public Top100RawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new Top100RawService($client);
    }

    /**
     * @api
     *
     * Get the top 100 contributors on a given date for a country or region.
     *
     * @param int $d path param: The day in the month
     * @param string $regionCode path param: The country, subnational1, or location code
     * @param int $y path param: The year, from 1800 to the present
     * @param int $m path param: The month, from 1-12
     * @param int $maxResults query param: Only fetch this number of contributors
     * @param 'spp'|'cl'|RankedBy $rankedBy query param: Order by number of complete checklists (cl) or by number of species seen (spp)
     *
     * @return list<Top100GetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        int $d,
        string $regionCode,
        int $y,
        int $m,
        int $maxResults = 100,
        string|RankedBy $rankedBy = 'spp',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'regionCode' => $regionCode,
                'y' => $y,
                'm' => $m,
                'maxResults' => $maxResults,
                'rankedBy' => $rankedBy,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($d, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
