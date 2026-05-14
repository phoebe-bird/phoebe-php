<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref\Taxonomy;

use Phoebe\Client;
use Phoebe\Core\Exceptions\APIException;
use Phoebe\Core\Util;
use Phoebe\Ref\Taxonomy\Ebird\EbirdGetResponseItem;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams\Fmt;
use Phoebe\RequestOptions;
use Phoebe\ServiceContracts\Ref\Taxonomy\EbirdContract;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
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
     * @param Fmt|value-of<Fmt> $fmt fetch the records in CSV or JSON format
     * @param string $locale use this language for common names
     * @param string $species only fetch records for these species
     * @param string $version fetch a specific version of the taxonomy
     * @param RequestOpts|null $requestOptions
     *
     * @return list<EbirdGetResponseItem>
     *
     * @throws APIException
     */
    public function retrieve(
        ?string $cat = null,
        Fmt|string $fmt = 'csv',
        string $locale = 'en',
        ?string $species = null,
        string $version = 'latest',
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'cat' => $cat,
                'fmt' => $fmt,
                'locale' => $locale,
                'species' => $species,
                'version' => $version,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
