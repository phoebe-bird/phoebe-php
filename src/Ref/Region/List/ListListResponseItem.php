<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\List;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListListResponseItemShape = array{
 *   code?: string|null, name?: string|null
 * }
 */
final class ListListResponseItem implements BaseModel
{
    /** @use SdkModel<ListListResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

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
    public static function with(?string $code = null, ?string $name = null): self
    {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
