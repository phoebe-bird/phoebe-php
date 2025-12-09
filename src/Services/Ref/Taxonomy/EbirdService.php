<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Contracts\BaseResponse;
use Phoebe\Core\Conversion\ListOf;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Ebird\EbirdGetResponseItem;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams\Fmt;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\EbirdContract;

final class EbirdService implements EbirdContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the taxonomy used by eBird. #### Notes Each entry in the taxonomy contains a species code for example, barswa for Barn Swallow. You can download the taxonomy for selected species using the *species* query parameter with a comma separating each code. Otherwise the full taxonomy is downloaded.
     *
     * @param array{
     *   cat?: string,
     *   fmt?: 'csv'|'json'|Fmt,
     *   locale?: string,
     *   species?: string,
     *   version?: string,
     * }|EbirdRetrieveParams $params
     *
     * @return list<EbirdGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        array|EbirdRetrieveParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = EbirdRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<list<EbirdGetResponseItem>> */
        $response = $this->client->request(
            method: 'get',
            path: 'ref/taxonomy/ebird',
            query: $parsed,
            options: $options,
            convert: new ListOf(EbirdGetResponseItem::class),
        );

        return $response->parse();
    }
}
