<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams;

/**
 * Include a subset (simple), or all (full), of the fields available.
 */
enum Detail: string
{
    case SIMPLE = 'simple';

    case FULL = 'full';
}
