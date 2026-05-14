<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\List_\ListListParams;

/**
 * Fetch the records in CSV or JSON format.
 */
enum Fmt: string
{
    case CSV = 'csv';

    case JSON = 'json';
}
