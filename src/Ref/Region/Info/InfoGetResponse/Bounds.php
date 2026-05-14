<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Info\InfoGetResponse;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type BoundsShape = array{
 *   maxX?: float|null, maxY?: float|null, minX?: float|null, minY?: float|null
 * }
 */
final class Bounds implements BaseModel
{
    /** @use SdkModel<BoundsShape> */
    use SdkModel;

    #[Optional]
    public ?float $maxX;

    #[Optional]
    public ?float $maxY;

    #[Optional]
    public ?float $minX;

    #[Optional]
    public ?float $minY;

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
        ?float $maxX = null,
        ?float $maxY = null,
        ?float $minX = null,
        ?float $minY = null,
    ): self {
        $self = new self;

        null !== $maxX && $self['maxX'] = $maxX;
        null !== $maxY && $self['maxY'] = $maxY;
        null !== $minX && $self['minX'] = $minX;
        null !== $minY && $self['minY'] = $minY;

        return $self;
    }

    public function withMaxX(float $maxX): self
    {
        $self = clone $this;
        $self['maxX'] = $maxX;

        return $self;
    }

    public function withMaxY(float $maxY): self
    {
        $self = clone $this;
        $self['maxY'] = $maxY;

        return $self;
    }

    public function withMinX(float $minX): self
    {
        $self = clone $this;
        $self['minX'] = $minX;

        return $self;
    }

    public function withMinY(float $minY): self
    {
        $self = clone $this;
        $self['minY'] = $minY;

        return $self;
    }
}
