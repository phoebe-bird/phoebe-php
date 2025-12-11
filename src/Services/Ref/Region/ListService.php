<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Region\List\ListListParams\Fmt;
use Phoebe\Ref\Region\List\ListListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\ListContract;

final class ListService implements ListContract
{
    /**
     * @api
     */
    public ListRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListRawService($client);
    }

    /**
     * @api
     *
     * Get the list of sub-regions for a given country or region. #### Notes Not all combinations of region type and region code are valid. You can fetch all the subnational1 or subnational2 regions for a country however you can only specify a region type of 'country' when using 'world' as a region code.
     *
     * @param string $parentRegionCode path param: The country or subnational1 code, or 'world'
     * @param string $regionType path param: The region type: 'country', 'subnational1' or 'subnational2'
     * @param 'csv'|'json'|Fmt $fmt query param: Fetch the records in CSV or JSON format
     *
     * @return list<ListListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $parentRegionCode,
        string $regionType,
        string|Fmt $fmt = 'json',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['regionType' => $regionType, 'fmt' => $fmt]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($parentRegionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
