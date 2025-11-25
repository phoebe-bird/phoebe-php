<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Historic\HistoricListParams;

/**
 * Include a subset (simple), or all (full), of the fields available.
 */
enum Detail: string
{
    case SIMPLE = 'simple';

    case FULL = 'full';
}
