<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\ServiceContracts\Ref\TaxonomyRawContract;

final class TaxonomyRawService implements TaxonomyRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
