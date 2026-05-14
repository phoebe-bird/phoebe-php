<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Info\InfoGetResponse;
use Phoebe\Ref\Region\Info\InfoRetrieveParams;
use Phoebe\Ref\Region\Info\InfoRetrieveParams\RegionNameFormat;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\InfoRawContract;

/**
 * The ref/region end-points return information on regions.
 *
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class InfoRawService implements InfoRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   delim?: string, regionNameFormat?: RegionNameFormat|value-of<RegionNameFormat>
     * }|InfoRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfoGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|InfoRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InfoRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/region/info/%1$s', $regionCode],
            query: $parsed,
            options: $options,
            convert: InfoGetResponse::class,
        );
    }
}
