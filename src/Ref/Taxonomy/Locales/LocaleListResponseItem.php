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
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $lastUpdated && $self['lastUpdated'] = $lastUpdated;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withLastUpdated(string $lastUpdated): self
    {
        $self = clone $this;
        $self['lastUpdated'] = $lastUpdated;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
