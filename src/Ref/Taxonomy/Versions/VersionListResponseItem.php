<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Versions;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type VersionListResponseItemShape = array{
 *   authorityVer?: float|null, latest?: bool|null
 * }
 */
final class VersionListResponseItem implements BaseModel
{
    /** @use SdkModel<VersionListResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?float $authorityVer;

    #[Optional]
    public ?bool $latest;

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
        ?float $authorityVer = null,
        ?bool $latest = null
    ): self {
        $self = new self;

        null !== $authorityVer && $self['authorityVer'] = $authorityVer;
        null !== $latest && $self['latest'] = $latest;

        return $self;
    }

    public function withAuthorityVer(float $authorityVer): self
    {
        $self = clone $this;
        $self['authorityVer'] = $authorityVer;

        return $self;
    }

    public function withLatest(bool $latest): self
    {
        $self = clone $this;
        $self['latest'] = $latest;

        return $self;
    }
}
