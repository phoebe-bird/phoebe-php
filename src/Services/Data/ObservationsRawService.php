<?php

declare(strict_types=1);

namespace Phoebe\Services\Data;

use Phoebe\Client;
use Phoebe\ServiceContracts\Data\ObservationsRawContract;

final class ObservationsRawService implements ObservationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
