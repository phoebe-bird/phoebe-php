<?php

declare(strict_types=1);

namespace Phoebe\Product\Top100\Top100RetrieveParams;

/**
 * Order by number of complete checklists (cl) or by number of species seen (spp).
 */
enum RankedBy: string
{
    case SPP = 'spp';

    case CL = 'cl';
}
