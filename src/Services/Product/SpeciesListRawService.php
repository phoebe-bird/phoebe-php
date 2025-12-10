<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\SpeciesListRawContract;

final class SpeciesListRawService implements SpeciesListRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of species codes ever seen in a region, in taxonomic order (species taxa only)
     * #### Notes The results are usually updated every 10 seconds for locations, every day for larger regions.
     *
     * @param string $regionCode Any location, USFWS region, subnational2, subnational1, country, or custom region code
     *
     * @return BaseResponse<list<string>>
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
            path: ['product/spplist/%1$s', $regionCode],
            options: $requestOptions,
            convert: new ListOf('string'),
        );
    }
}
