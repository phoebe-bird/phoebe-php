<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Historic;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Cat;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Detail;
use Phoebe\Data\Observations\Recent\Historic\HistoricListParams\Rank;

/**
 * Get a list of all taxa seen in a country, region or location on a specific date, with the specific observations determined by the "rank" parameter (defaults to latest observation on the date).
 * #### Notes Responses may be cached for 30 minutes.
 *
 * @see Phoebe\Services\Data\Observations\Recent\HistoricService::list()
 *
 * @phpstan-type HistoricListParamsShape = array{
 *   regionCode: string,
 *   y: int,
 *   m: int,
 *   cat?: Cat|value-of<Cat>,
 *   detail?: Detail|value-of<Detail>,
 *   hotspot?: bool,
 *   includeProvisional?: bool,
 *   maxResults?: int,
 *   r?: list<string>,
 *   rank?: Rank|value-of<Rank>,
 *   sppLocale?: string,
 * }
 */
final class HistoricListParams implements BaseModel
{
    /** @use SdkModel<HistoricListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $regionCode;

    #[Api]
    public int $y;

    #[Api]
    public int $m;

    /**
     * Only fetch observations from these taxonomic categories.
     *
     * @var value-of<Cat>|null $cat
     */
    #[Api(enum: Cat::class, optional: true)]
    public ?string $cat;

    /**
     * Include a subset (simple), or all (full), of the fields available.
     *
     * @var value-of<Detail>|null $detail
     */
    #[Api(enum: Detail::class, optional: true)]
    public ?string $detail;

    /**
     * Only fetch observations from hotspots.
     */
    #[Api(optional: true)]
    public ?bool $hotspot;

    /**
     * Include observations which have not yet been reviewed.
     */
    #[Api(optional: true)]
    public ?bool $includeProvisional;

    /**
     * Only fetch this number of observations.
     */
    #[Api(optional: true)]
    public ?int $maxResults;

    /**
     * Fetch observations from up to 50 locations.
     *
     * @var list<string>|null $r
     */
    #[Api(list: 'string', optional: true)]
    public ?array $r;

    /**
     * Include latest observation of the day, or the first added.
     *
     * @var value-of<Rank>|null $rank
     */
    #[Api(enum: Rank::class, optional: true)]
    public ?string $rank;

    /**
     * Use this language for species common names.
     */
    #[Api(optional: true)]
    public ?string $sppLocale;

    /**
     * `new HistoricListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HistoricListParams::with(regionCode: ..., y: ..., m: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HistoricListParams)->withRegionCode(...)->withY(...)->withM(...)
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
     * @param Cat|value-of<Cat> $cat
     * @param Detail|value-of<Detail> $detail
     * @param list<string> $r
     * @param Rank|value-of<Rank> $rank
     */
    public static function with(
        string $regionCode,
        int $y,
        int $m,
        Cat|string|null $cat = null,
        Detail|string|null $detail = null,
        ?bool $hotspot = null,
        ?bool $includeProvisional = null,
        ?int $maxResults = null,
        ?array $r = null,
        Rank|string|null $rank = null,
        ?string $sppLocale = null,
    ): self {
        $obj = new self;

        $obj->regionCode = $regionCode;
        $obj->y = $y;
        $obj->m = $m;

        null !== $cat && $obj['cat'] = $cat;
        null !== $detail && $obj['detail'] = $detail;
        null !== $hotspot && $obj->hotspot = $hotspot;
        null !== $includeProvisional && $obj->includeProvisional = $includeProvisional;
        null !== $maxResults && $obj->maxResults = $maxResults;
        null !== $r && $obj->r = $r;
        null !== $rank && $obj['rank'] = $rank;
        null !== $sppLocale && $obj->sppLocale = $sppLocale;

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
     * Only fetch observations from these taxonomic categories.
     *
     * @param Cat|value-of<Cat> $cat
     */
    public function withCat(Cat|string $cat): self
    {
        $obj = clone $this;
        $obj['cat'] = $cat;

        return $obj;
    }

    /**
     * Include a subset (simple), or all (full), of the fields available.
     *
     * @param Detail|value-of<Detail> $detail
     */
    public function withDetail(Detail|string $detail): self
    {
        $obj = clone $this;
        $obj['detail'] = $detail;

        return $obj;
    }

    /**
     * Only fetch observations from hotspots.
     */
    public function withHotspot(bool $hotspot): self
    {
        $obj = clone $this;
        $obj->hotspot = $hotspot;

        return $obj;
    }

    /**
     * Include observations which have not yet been reviewed.
     */
    public function withIncludeProvisional(bool $includeProvisional): self
    {
        $obj = clone $this;
        $obj->includeProvisional = $includeProvisional;

        return $obj;
    }

    /**
     * Only fetch this number of observations.
     */
    public function withMaxResults(int $maxResults): self
    {
        $obj = clone $this;
        $obj->maxResults = $maxResults;

        return $obj;
    }

    /**
     * Fetch observations from up to 50 locations.
     *
     * @param list<string> $r
     */
    public function withR(array $r): self
    {
        $obj = clone $this;
        $obj->r = $r;

        return $obj;
    }

    /**
     * Include latest observation of the day, or the first added.
     *
     * @param Rank|value-of<Rank> $rank
     */
    public function withRank(Rank|string $rank): self
    {
        $obj = clone $this;
        $obj['rank'] = $rank;

        return $obj;
    }

    /**
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $obj = clone $this;
        $obj->sppLocale = $sppLocale;

        return $obj;
    }
}
