<?php

declare(strict_types=1);

namespace Phoebe\Core\Concerns;

use Phoebe\Core\Conversion\Contracts\Converter;
use Phoebe\Core\Conversion\Contracts\ConverterSource;
use Phoebe\Core\Conversion\UnionOf;

/**
 * @internal
 */
trait SdkUnion
{
    private static Converter $converter;

    public static function discriminator(): ?string
    {
        return null;
    }

    /**
     * @return array<string, Converter|ConverterSource|string>|list<Converter|ConverterSource|string>
     */
    public static function variants(): array
    {
        return [];
    }

    public static function converter(): Converter
    {
        if (isset(static::$converter)) {
            return static::$converter;
        }

        return static::$converter = new UnionOf(discriminator: static::discriminator(), variants: static::variants());
    }
}
