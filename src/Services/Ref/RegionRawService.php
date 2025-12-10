<?php

declare(strict_types=1);

namespace Phoebe\Services\Ref;

use Phoebe\Client;
use Phoebe\ServiceContracts\Ref\RegionRawContract;

final class RegionRawService implements RegionRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
