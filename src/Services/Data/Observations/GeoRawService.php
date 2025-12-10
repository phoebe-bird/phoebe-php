<?php

declare(strict_types=1);

namespace Phoebe\Services\Data\Observations;

use Phoebe\Client;
use Phoebe\ServiceContracts\Data\Observations\GeoRawContract;

final class GeoRawService implements GeoRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
