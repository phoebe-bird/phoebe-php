<?php

declare(strict_types=1);

namespace Phoebe\Services\Product;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Product\SpeciesListContract;

final class SpeciesListService implements SpeciesListContract
{
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
     * @return list<string>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['product/spplist/%1$s', $regionCode],
            options: $requestOptions,
            convert: new ListOf('string'),
        );
    }
}
