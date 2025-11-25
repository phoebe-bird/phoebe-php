<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams;

/**
 * Fetch the records in CSV or JSON format.
 */
enum Fmt: string
{
    case CSV = 'csv';

    case JSON = 'json';
}
