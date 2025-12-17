<?php

declare(strict_types=1);

namespace Phoebe\Product\Top100;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Product\Top100\Top100RetrieveParams\RankedBy;

/**
 * Get the top 100 contributors on a given date for a country or region.
 *
 * #### Notes
 *
 * The results are updated every 15 minutes.
 *
 * When ordering by the number of completed checklists, the number of species seen will always be zero. Similarly when ordering by the number of species seen the number of completed checklists will always be zero.
 * <b>Selected Response Field Notes</b>
 *
 * profileHandle - if a user has enabled their profile, this is the handle to reach it via ebird.org/ebird/profile/{profileHandle}
 *
 * numSpecies - always zero when checklistSort parameter is true. Invalid observations ARE included in this total
 * numCompleteChecklists - always zero when checklistSort parameter is false
 *
 * @see Phoebe\Services\Product\Top100Service::retrieve()
 *
 * @phpstan-type Top100RetrieveParamsShape = array{
 *   regionCode: string,
 *   y: int,
 *   m: int,
 *   maxResults?: int|null,
 *   rankedBy?: null|RankedBy|value-of<RankedBy>,
 * }
 */
final class Top100RetrieveParams implements BaseModel
{
    /** @use SdkModel<Top100RetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $regionCode;

    #[Required]
    public int $y;

    #[Required]
    public int $m;

    /**
     * Only fetch this number of contributors.
     */
    #[Optional]
    public ?int $maxResults;

    /**
     * Order by number of complete checklists (cl) or by number of species seen (spp).
     *
     * @var value-of<RankedBy>|null $rankedBy
     */
    #[Optional(enum: RankedBy::class)]
    public ?string $rankedBy;

    /**
     * `new Top100RetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Top100RetrieveParams::with(regionCode: ..., y: ..., m: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Top100RetrieveParams)->withRegionCode(...)->withY(...)->withM(...)
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
     * @param RankedBy|value-of<RankedBy> $rankedBy
     */
    public static function with(
        string $regionCode,
        int $y,
        int $m,
        ?int $maxResults = null,
        RankedBy|string|null $rankedBy = null,
    ): self {
        $self = new self;

        $self['regionCode'] = $regionCode;
        $self['y'] = $y;
        $self['m'] = $m;

        null !== $maxResults && $self['maxResults'] = $maxResults;
        null !== $rankedBy && $self['rankedBy'] = $rankedBy;

        return $self;
    }

    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    public function withY(int $y): self
    {
        $self = clone $this;
        $self['y'] = $y;

        return $self;
    }

    public function withM(int $m): self
    {
        $self = clone $this;
        $self['m'] = $m;

        return $self;
    }

    /**
     * Only fetch this number of contributors.
     */
    public function withMaxResults(int $maxResults): self
    {
        $self = clone $this;
        $self['maxResults'] = $maxResults;

        return $self;
    }

    /**
     * Order by number of complete checklists (cl) or by number of species seen (spp).
     *
     * @param RankedBy|value-of<RankedBy> $rankedBy
     */
    public function withRankedBy(RankedBy|string $rankedBy): self
    {
        $self = clone $this;
        $self['rankedBy'] = $rankedBy;

        return $self;
    }
}
