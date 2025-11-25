<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\SpeciesGroups\SpeciesGroupListParams;

/**
 * The order in which groups are returned.
 */
enum SpeciesGrouping: string
{
    case MERLIN = 'merlin';

    case EBIRD = 'ebird';
}
