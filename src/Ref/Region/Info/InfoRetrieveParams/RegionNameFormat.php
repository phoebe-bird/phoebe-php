<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Info\InfoRetrieveParams;

/**
 * Control how the name is displayed.
 */
enum RegionNameFormat: string
{
    case DETAILED = 'detailed';

    case DETAILEDNOQUAL = 'detailednoqual';

    case FULL = 'full';

    case NAMEQUAL = 'namequal';

    case NAMEONLY = 'nameonly';

    case REVDETAILED = 'revdetailed';
}
