<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations\Recent;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Data\Observations\Observation;
use Phoebe\Data\Observations\Recent\Species\SpecieRetrieveParams;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Data\Observations\Recent\SpeciesContract;

final class SpeciesService implements SpeciesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the recent observations, up to 30 days ago, of a particular species
     * in a country, region or location. Results include only the most recent observation from each location in the region specified.
     * #### Notes
     *
     * The species code is typically a 6-letter code, e.g. cangoo for Canada Goose. You can
     * get complete set of species code from the GET eBird Taxonomy end-point.
     *
     * When using the *r* query parameter set the *regionCode* URL parameter to an empty string.
     *
     * @param array{
     *   regionCode: string,
     *   back?: int,
     *   hotspot?: bool,
     *   includeProvisional?: bool,
     *   maxResults?: int,
     *   r?: list<string>,
     *   sppLocale?: string,
     * }|SpecieRetrieveParams $params
     *
     * @return list<Observation>
     *
     * @throws APIException
     */
    public function retrieve(
        string $speciesCode,
        array|SpecieRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = SpecieRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $regionCode = $parsed['regionCode'];
        unset($parsed['regionCode']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['data/obs/%1$s/recent/%2$s', $regionCode, $speciesCode],
            query: $parsed,
            options: $options,
            convert: new ListOf(Observation::class),
        );
    }
}
