<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Locales;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocaleListResponseItemShape = array{
 *   code?: string|null, lastUpdated?: string|null, name?: string|null
 * }
 */
final class LocaleListResponseItem implements BaseModel
{
    /** @use SdkModel<LocaleListResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $lastUpdated;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $code = null,
        ?string $lastUpdated = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $lastUpdated && $obj['lastUpdated'] = $lastUpdated;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    public function withLastUpdated(string $lastUpdated): self
    {
        $obj = clone $this;
        $obj['lastUpdated'] = $lastUpdated;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
