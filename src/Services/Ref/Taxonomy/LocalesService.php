<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Locales\LocaleListParams;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\LocalesContract;

final class LocalesService implements LocalesContract
{
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
     * @param array{Accept_Language?: string}|LocaleListParams $params
     *
     * @return list<LocaleListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        array|LocaleListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = LocaleListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ref/taxa-locales/ebird',
            headers: $parsed,
            options: $options,
            convert: new ListOf(LocaleListResponseItem::class),
        );
    }
}
