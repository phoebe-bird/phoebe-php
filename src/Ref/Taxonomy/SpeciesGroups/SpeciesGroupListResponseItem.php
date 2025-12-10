<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\SpeciesGroups;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Core\Conversion\ListOf;

/**
 * @phpstan-type SpeciesGroupListResponseItemShape = array{
 *   groupName?: string|null,
 *   groupOrder?: int|null,
 *   taxonOrderBounds?: list<list<float>>|null,
 * }
 */
final class SpeciesGroupListResponseItem implements BaseModel
{
    /** @use SdkModel<SpeciesGroupListResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $groupName;

    #[Optional]
    public ?int $groupOrder;

    /** @var list<list<float>>|null $taxonOrderBounds */
    #[Optional(list: new ListOf('float'))]
    public ?array $taxonOrderBounds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<list<float>> $taxonOrderBounds
     */
    public static function with(
        ?string $groupName = null,
        ?int $groupOrder = null,
        ?array $taxonOrderBounds = null,
    ): self {
        $self = new self;

        null !== $groupName && $self['groupName'] = $groupName;
        null !== $groupOrder && $self['groupOrder'] = $groupOrder;
        null !== $taxonOrderBounds && $self['taxonOrderBounds'] = $taxonOrderBounds;

        return $self;
    }

    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

    public function withGroupOrder(int $groupOrder): self
    {
        $self = clone $this;
        $self['groupOrder'] = $groupOrder;

        return $self;
    }

    /**
     * @param list<list<float>> $taxonOrderBounds
     */
    public function withTaxonOrderBounds(array $taxonOrderBounds): self
    {
        $self = clone $this;
        $self['taxonOrderBounds'] = $taxonOrderBounds;

        return $self;
    }
}
