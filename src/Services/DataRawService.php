<?php

declare(strict_types=1);

namespace Phoebe\Services;

use Phoebe\Client;
use Phoebe\ServiceContracts\DataRawContract;

final class DataRawService implements DataRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
