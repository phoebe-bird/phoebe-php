<?php

declare(strict_types=1);

namespace Phoebe\Core\Conversion\Contracts;

use Phoebe\Core\Conversion\CoerceState;
use Phoebe\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
