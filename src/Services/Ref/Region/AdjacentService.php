<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Region;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Region\Adjacent\AdjacentListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Region\AdjacentContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class AdjacentService implements AdjacentContract
{
    /**
     * @api
     */
    public AdjacentRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AdjacentRawService($client);
    }

    /**
     * @api
     *
     * Get the list of countries or regions that share a border with this one. #### Notes Only subnational2 codes in the United States, New Zealand, or Mexico are currently supported
     *
     * @param string $regionCode the country, subnational1 or subnational2 code
     * @param RequestOpts|null $requestOptions
     *
     * @return list<AdjacentListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $regionCode,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($regionCode, requestOptions: $requestOptions);

        return $response->parse();
    }
}
