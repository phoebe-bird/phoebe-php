<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Region\Info\InfoGetResponse;
use Phoebe\Ref\Region\Info\InfoRetrieveParams\RegionNameFormat;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\InfoContract;

final class InfoService implements InfoContract
{
    /**
     * @api
     */
    public InfoRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InfoRawService($client);
    }

    /**
     * @api
     *
     * Get information on the name and geographical area covered by a region.
     * #### Notes
     *
     * Taking Madison County, New York, USA (location code US-NY-053) as an example
     * the various values for the regionNameFormat query parameter work as follows:
     *
     * | Value | Description | Result |
     * | ------| ----------- | ------ |
     * | detailed | return a detailed description | Madison County, New York, US |
     * | detailednoqual | return the name to the subnational1 level | Madison, New York |
     * | full | return the full description | Madison, New York, United States |
     * | namequal | return the qualified name | Madison County |
     * | nameonly | return only the name of the region | Madison |
     * | revdetailed | return the detailed description in reverse | US, New York, Madison County |
     *
     * @param string $regionCode The major region, country, subnational1 or subnational2 code, or locId
     * @param string $delim the characters used to separate elements in the name
     * @param 'detailed'|'detailednoqual'|'full'|'namequal'|'nameonly'|'revdetailed'|RegionNameFormat $regionNameFormat control how the name is displayed
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        string $delim = ', ',
        string|RegionNameFormat $regionNameFormat = 'full',
        ?RequestOptions $requestOptions = null,
    ): InfoGetResponse {
        $params = Util::removeNulls(
            ['delim' => $delim, 'regionNameFormat' => $regionNameFormat]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($regionCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
