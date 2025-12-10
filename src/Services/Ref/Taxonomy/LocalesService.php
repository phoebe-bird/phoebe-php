<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Locales\LocaleListResponseItem;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\LocalesContract;

final class LocalesService implements LocalesContract
{
    /**
     * @api
     */
    public LocalesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LocalesRawService($client);
    }

    /**
     * @api
     *
     * Returns the list of supported locale codes and names for species common names, with the last time they were updated. Use the accept-language header to get translated language names when available.
     *
     * NOTE: The locale codes and names are stable but the other fields in this result are not yet finalized and should be used with caution.
     *
     * @return list<LocaleListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?string $acceptLanguage = null,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = ['acceptLanguage' => $acceptLanguage];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
