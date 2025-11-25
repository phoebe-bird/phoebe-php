<?php

declare(strict_types=1);

namespace Phoebe\Product\Stats;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkResponse;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type StatGetResponseShape = array{
 *   numChecklists?: int|null, numContributors?: int|null, numSpecies?: int|null
 * }
 */
final class StatGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<StatGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?int $numChecklists;

    #[Api(optional: true)]
    public ?int $numContributors;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $numChecklists && $obj->numChecklists = $numChecklists;
        null !== $numContributors && $obj->numContributors = $numContributors;
        null !== $numSpecies && $obj->numSpecies = $numSpecies;

        return $obj;
    }

    public function withNumChecklists(int $numChecklists): self
    {
        $obj = clone $this;
        $obj->numChecklists = $numChecklists;

        return $obj;
    }

    public function withNumContributors(int $numContributors): self
    {
        $obj = clone $this;
        $obj->numContributors = $numContributors;

        return $obj;
    }

    public function withNumSpecies(int $numSpecies): self
    {
        $obj = clone $this;
        $obj->numSpecies = $numSpecies;

        return $obj;
    }
}
