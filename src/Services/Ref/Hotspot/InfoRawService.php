<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Hotspot;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Hotspot\Info\InfoGetResponse;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Hotspot\InfoRawContract;

/**
 * With the ref/hotspot end-points you can find the hotspots for a given country or region or nearby hotspots.
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
     * Get information on the location of a hotspot. #### Notes This API call only works for hotspots. If you pass the location code for a private location or an invalid location code then an HTTP 410 (Gone) error is returned.
     *
     * @param string $locID the location code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfoGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $locID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ref/hotspot/info/%1$s', $locID],
            options: $requestOptions,
            convert: InfoGetResponse::class,
        );
    }
}
