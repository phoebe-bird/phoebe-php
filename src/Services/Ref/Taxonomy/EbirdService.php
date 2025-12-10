<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Ebird\EbirdGetResponseItem;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams\Fmt;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\EbirdContract;

final class EbirdService implements EbirdContract
{
    /**
     * @api
     */
    public EbirdRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EbirdRawService($client);
    }

    /**
     * @api
     *
     * Get the taxonomy used by eBird. #### Notes Each entry in the taxonomy contains a species code for example, barswa for Barn Swallow. You can download the taxonomy for selected species using the *species* query parameter with a comma separating each code. Otherwise the full taxonomy is downloaded.
     *
     * @param string $cat only fetch records from these taxonomic categories
     * @param 'csv'|'json'|Fmt $fmt fetch the records in CSV or JSON format
     * @param string $locale use this language for common names
     * @param string $species only fetch records for these species
     * @param string $version fetch a specific version of the taxonomy
     *
     * @return list<EbirdGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        ?string $cat = null,
        string|Fmt $fmt = 'csv',
        string $locale = 'en',
        ?string $species = null,
        string $version = 'latest',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'cat' => $cat,
            'fmt' => $fmt,
            'locale' => $locale,
            'species' => $species,
            'version' => $version,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
