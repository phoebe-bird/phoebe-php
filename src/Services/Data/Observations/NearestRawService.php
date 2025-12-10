<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations;

use Phoebe\Client;
use Phoebe\ServiceContracts\Data\Observations\NearestRawContract;

final class NearestRawService implements NearestRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
