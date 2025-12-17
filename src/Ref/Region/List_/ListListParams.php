<?php

declare(strict_types=1);

namespace Phoebe\Ref\Region\List_;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Ref\Region\List_\ListListParams\Fmt;

/**
 * Get the list of sub-regions for a given country or region. #### Notes Not all combinations of region type and region code are valid. You can fetch all the subnational1 or subnational2 regions for a country however you can only specify a region type of 'country' when using 'world' as a region code.
 *
 * @see Phoebe\Services\Ref\Region\ListService::list()
 *
 * @phpstan-type ListListParamsShape = array{
 *   regionType: string, fmt?: null|Fmt|value-of<Fmt>
 * }
 */
final class ListListParams implements BaseModel
{
    /** @use SdkModel<ListListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $regionType;

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @var value-of<Fmt>|null $fmt
     */
    #[Optional(enum: Fmt::class)]
    public ?string $fmt;

    /**
     * `new ListListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListListParams::with(regionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListListParams)->withRegionType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fmt|value-of<Fmt> $fmt
     */
    public static function with(
        string $regionType,
        Fmt|string|null $fmt = null
    ): self {
        $self = new self;

        $self['regionType'] = $regionType;

        null !== $fmt && $self['fmt'] = $fmt;

        return $self;
    }

    public function withRegionType(string $regionType): self
    {
        $self = clone $this;
        $self['regionType'] = $regionType;

        return $self;
    }

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @param Fmt|value-of<Fmt> $fmt
     */
    public function withFmt(Fmt|string $fmt): self
    {
        $self = clone $this;
        $self['fmt'] = $fmt;

        return $self;
    }
}
