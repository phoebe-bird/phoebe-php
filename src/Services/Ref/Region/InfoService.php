<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Info\InfoGetResponse;
use Phoebe\Ref\Region\Info\InfoRetrieveParams;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\InfoContract;

final class InfoService implements InfoContract
{
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
     * @param array{
     *   delim?: string,
     *   regionNameFormat?: 'detailed'|'detailednoqual'|'full'|'namequal'|'nameonly'|'revdetailed',
     * }|InfoRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $regionCode,
        array|InfoRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InfoGetResponse {
        [$parsed, $options] = InfoRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ref/region/info/%1$s', $regionCode],
            query: $parsed,
            options: $options,
            convert: InfoGetResponse::class,
        );
    }
}
