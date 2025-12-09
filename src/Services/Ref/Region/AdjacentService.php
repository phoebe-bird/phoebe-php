<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Adjacent\AdjacentListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\AdjacentContract;

final class AdjacentService implements AdjacentContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of countries or regions that share a border with this one. #### Notes Only subnational2 codes in the United States, New Zealand, or Mexico are currently supported
     *
     * @return list<AdjacentListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?RequestOptions $requestOptions = null
    ): array {
        /** @var BaseResponse<list<AdjacentListResponseItem>> */
        $response = $this->client->request(
            method: 'get',
            path: ['ref/adjacent/%1$s', $regionCode],
            options: $requestOptions,
            convert: new ListOf(AdjacentListResponseItem::class),
        );

        return $response->parse();
    }
}
