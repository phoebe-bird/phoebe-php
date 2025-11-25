<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Info\InfoGetResponse;

use Phoebe\Core\Attributes\Api;
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

    #[Api(optional: true)]
    public ?float $maxX;

    #[Api(optional: true)]
    public ?float $maxY;

    #[Api(optional: true)]
    public ?float $minX;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $maxX && $obj->maxX = $maxX;
        null !== $maxY && $obj->maxY = $maxY;
        null !== $minX && $obj->minX = $minX;
        null !== $minY && $obj->minY = $minY;

        return $obj;
    }

    public function withMaxX(float $maxX): self
    {
        $obj = clone $this;
        $obj->maxX = $maxX;

        return $obj;
    }

    public function withMaxY(float $maxY): self
    {
        $obj = clone $this;
        $obj->maxY = $maxY;

        return $obj;
    }

    public function withMinX(float $minX): self
    {
        $obj = clone $this;
        $obj->minX = $minX;

        return $obj;
    }

    public function withMinY(float $minY): self
    {
        $obj = clone $this;
        $obj->minY = $minY;

        return $obj;
    }
}
