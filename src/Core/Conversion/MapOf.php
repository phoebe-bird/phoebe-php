<?php

declare(strict_types=1);

namespace Phoebe\Core\Conversion;

use Phoebe\Core\Conversion\Concerns\ArrayOf;
use Phoebe\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
