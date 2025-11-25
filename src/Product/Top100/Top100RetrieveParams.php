<?php

declare(strict_types=1);

namespace Phoebe\Product\Top100;

use Phoebe\Core\Attributes\Api;
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
 *   maxResults?: int,
 *   rankedBy?: RankedBy|value-of<RankedBy>,
 * }
 */
final class Top100RetrieveParams implements BaseModel
{
    /** @use SdkModel<Top100RetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $regionCode;

    #[Api]
    public int $y;

    #[Api]
    public int $m;

    /**
     * Only fetch this number of contributors.
     */
    #[Api(optional: true)]
    public ?int $maxResults;

    /**
     * Order by number of complete checklists (cl) or by number of species seen (spp).
     *
     * @var value-of<RankedBy>|null $rankedBy
     */
    #[Api(enum: RankedBy::class, optional: true)]
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
        $obj = new self;

        $obj->regionCode = $regionCode;
        $obj->y = $y;
        $obj->m = $m;

        null !== $maxResults && $obj->maxResults = $maxResults;
        null !== $rankedBy && $obj['rankedBy'] = $rankedBy;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    public function withY(int $y): self
    {
        $obj = clone $this;
        $obj->y = $y;

        return $obj;
    }

    public function withM(int $m): self
    {
        $obj = clone $this;
        $obj->m = $m;

        return $obj;
    }

    /**
     * Only fetch this number of contributors.
     */
    public function withMaxResults(int $maxResults): self
    {
        $obj = clone $this;
        $obj->maxResults = $maxResults;

        return $obj;
    }

    /**
     * Order by number of complete checklists (cl) or by number of species seen (spp).
     *
     * @param RankedBy|value-of<RankedBy> $rankedBy
     */
    public function withRankedBy(RankedBy|string $rankedBy): self
    {
        $obj = clone $this;
        $obj['rankedBy'] = $rankedBy;

        return $obj;
    }
}
