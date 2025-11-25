<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Geo\Recent\RecentListParams;

/**
 * Only fetch observations from these taxonomic categories.
 */
enum Cat: string
{
    case SPECIES = 'species';

    case SLASH = 'slash';

    case ISSF = 'issf';

    case SPUH = 'spuh';

    case HYBRID = 'hybrid';

    case DOMESTIC = 'domestic';

    case FORM = 'form';

    case INTERGRADE = 'intergrade';
}
