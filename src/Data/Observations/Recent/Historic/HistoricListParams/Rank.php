<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Historic\HistoricListParams;

/**
 * Include latest observation of the day, or the first added.
 */
enum Rank: string
{
    case MREC = 'mrec';

    case CREATE = 'create';
}
