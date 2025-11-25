<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Geo\Recent\RecentListParams;

/**
 * Sort observations by taxonomy or by date, most recent first.
 */
enum Sort: string
{
    case DATE = 'date';

    case SPECIES = 'species';
}
