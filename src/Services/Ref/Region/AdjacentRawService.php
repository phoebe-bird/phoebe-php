<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Adjacent\AdjacentListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\AdjacentRawContract;

final class AdjacentRawService implements AdjacentRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of countries or regions that share a border with this one. #### Notes Only subnational2 codes in the United States, New Zealand, or Mexico are currently supported
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     *
     * @return BaseResponse<list<AdjacentListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/adjacent/%1$s', $regionCode],
            options: $requestOptions,
            convert: new ListOf(AdjacentListResponseItem::class),
        );
    }
}
