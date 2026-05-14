<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Taxonomy\Locales\LocaleListParams;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\LocalesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
final class LocalesRawService implements LocalesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the list of supported locale codes and names for species common names, with the last time they were updated. Use the accept-language header to get translated language names when available.
     *
     * NOTE: The locale codes and names are stable but the other fields in this result are not yet finalized and should be used with caution.
     *
     * @param array{acceptLanguage?: string}|LocaleListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<LocaleListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|LocaleListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LocaleListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ref/taxa-locales/ebird',
            headers: Util::array_transform_keys(
                $parsed,
                ['acceptLanguage' => 'Accept-Language']
            ),
            options: $options,
            convert: new ListOf(LocaleListResponseItem::class),
        );
    }
}
