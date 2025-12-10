<?php

declare(strict_types=1);

namespace Phoebe\Services;

use Phoebe\Client;
use Phoebe\ServiceContracts\RefRawContract;

final class RefRawService implements RefRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
