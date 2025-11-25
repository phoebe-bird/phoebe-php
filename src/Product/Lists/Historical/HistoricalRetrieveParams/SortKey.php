<?php

declare(strict_types=1);

namespace Phoebe\Product\Lists\Historical\HistoricalRetrieveParams;

/**
 * Order the results by the date of the checklist or by the date it was submitted.
 */
enum SortKey: string
{
    case OBS_DT = 'obs_dt';

    case CREATION_DT = 'creation_dt';
}
