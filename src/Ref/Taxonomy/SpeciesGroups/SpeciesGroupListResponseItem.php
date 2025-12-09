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
        $obj = new self;

        null !== $groupName && $obj['groupName'] = $groupName;
        null !== $groupOrder && $obj['groupOrder'] = $groupOrder;
        null !== $taxonOrderBounds && $obj['taxonOrderBounds'] = $taxonOrderBounds;

        return $obj;
    }

    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj['groupName'] = $groupName;

        return $obj;
    }

    public function withGroupOrder(int $groupOrder): self
    {
        $obj = clone $this;
        $obj['groupOrder'] = $groupOrder;

        return $obj;
    }

    /**
     * @param list<list<float>> $taxonOrderBounds
     */
    public function withTaxonOrderBounds(array $taxonOrderBounds): self
    {
        $obj = clone $this;
        $obj['taxonOrderBounds'] = $taxonOrderBounds;

        return $obj;
    }
}
