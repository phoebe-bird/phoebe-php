<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Hotspot;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Info\InfoGetResponse;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Hotspot\InfoContract;

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
     * Get information on the location of a hotspot. #### Notes This API call only works for hotspots. If you pass the location code for a private location or an invalid location code then an HTTP 410 (Gone) error is returned.
     *
     * @param string $locID the location code
     *
     * @throws APIException
     */
    public function retrieve(
        string $locID,
        ?RequestOptions $requestOptions = null
    ): InfoGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($locID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
