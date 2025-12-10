<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\Info;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Ref\Region\Info\InfoGetResponse\Bounds;

/**
 * @phpstan-type InfoGetResponseShape = array{
 *   bounds?: Bounds|null, result?: string|null
 * }
 */
final class InfoGetResponse implements BaseModel
{
    /** @use SdkModel<InfoGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Bounds $bounds;

    #[Optional]
    public ?string $result;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Bounds|array{
     *   maxX?: float|null, maxY?: float|null, minX?: float|null, minY?: float|null
     * } $bounds
     */
    public static function with(
        Bounds|array|null $bounds = null,
        ?string $result = null
    ): self {
        $self = new self;

        null !== $bounds && $self['bounds'] = $bounds;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * @param Bounds|array{
     *   maxX?: float|null, maxY?: float|null, minX?: float|null, minY?: float|null
     * } $bounds
     */
    public function withBounds(Bounds|array $bounds): self
    {
        $self = clone $this;
        $self['bounds'] = $bounds;

        return $self;
    }

    public function withResult(string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
