<?php

declare(strict_types=1);

namespace Phoebe\Product\Stats;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type StatGetResponseShape = array{
 *   numChecklists?: int|null, numContributors?: int|null, numSpecies?: int|null
 * }
 */
final class StatGetResponse implements BaseModel
{
    /** @use SdkModel<StatGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?int $numChecklists;

    #[Optional]
    public ?int $numContributors;

    #[Optional]
    public ?int $numSpecies;

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
        ?int $numChecklists = null,
        ?int $numContributors = null,
        ?int $numSpecies = null,
    ): self {
        $self = new self;

        null !== $numChecklists && $self['numChecklists'] = $numChecklists;
        null !== $numContributors && $self['numContributors'] = $numContributors;
        null !== $numSpecies && $self['numSpecies'] = $numSpecies;

        return $self;
    }

    public function withNumChecklists(int $numChecklists): self
    {
        $self = clone $this;
        $self['numChecklists'] = $numChecklists;

        return $self;
    }

    public function withNumContributors(int $numContributors): self
    {
        $self = clone $this;
        $self['numContributors'] = $numContributors;

        return $self;
    }

    public function withNumSpecies(int $numSpecies): self
    {
        $self = clone $this;
        $self['numSpecies'] = $numSpecies;

        return $self;
    }
}
