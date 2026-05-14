<?php

declare(strict_types=1);

namespace Phoebe\ServiceContracts\Ref\Taxonomy;

use Phoebe\Core\Exceptions\APIException;
use Phoebe\Ref\Taxonomy\Ebird\EbirdGetResponseItem;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams\Fmt;
use Phoebe\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Phoebe\RequestOptions
 */
interface EbirdContract
{
    /**
     * @api
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
    ): array;
}
