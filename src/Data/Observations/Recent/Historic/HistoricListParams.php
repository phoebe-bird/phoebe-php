<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Historic;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
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

    #[Required]
    public string $regionCode;

    #[Required]
    public int $y;

    #[Required]
    public int $m;

    /**
     * Only fetch observations from these taxonomic categories.
     *
     * @var value-of<Cat>|null $cat
     */
    #[Optional(enum: Cat::class)]
    public ?string $cat;

    /**
     * Include a subset (simple), or all (full), of the fields available.
     *
     * @var value-of<Detail>|null $detail
     */
    #[Optional(enum: Detail::class)]
    public ?string $detail;

    /**
     * Only fetch observations from hotspots.
     */
    #[Optional]
    public ?bool $hotspot;

    /**
     * Include observations which have not yet been reviewed.
     */
    #[Optional]
    public ?bool $includeProvisional;

    /**
     * Only fetch this number of observations.
     */
    #[Optional]
    public ?int $maxResults;

    /**
     * Fetch observations from up to 50 locations.
     *
     * @var list<string>|null $r
     */
    #[Optional(list: 'string')]
    public ?array $r;

    /**
     * Include latest observation of the day, or the first added.
     *
     * @var value-of<Rank>|null $rank
     */
    #[Optional(enum: Rank::class)]
    public ?string $rank;

    /**
     * Use this language for species common names.
     */
    #[Optional]
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
        $self = new self;

        $self['regionCode'] = $regionCode;
        $self['y'] = $y;
        $self['m'] = $m;

        null !== $cat && $self['cat'] = $cat;
        null !== $detail && $self['detail'] = $detail;
        null !== $hotspot && $self['hotspot'] = $hotspot;
        null !== $includeProvisional && $self['includeProvisional'] = $includeProvisional;
        null !== $maxResults && $self['maxResults'] = $maxResults;
        null !== $r && $self['r'] = $r;
        null !== $rank && $self['rank'] = $rank;
        null !== $sppLocale && $self['sppLocale'] = $sppLocale;

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
     * Only fetch observations from these taxonomic categories.
     *
     * @param Cat|value-of<Cat> $cat
     */
    public function withCat(Cat|string $cat): self
    {
        $self = clone $this;
        $self['cat'] = $cat;

        return $self;
    }

    /**
     * Include a subset (simple), or all (full), of the fields available.
     *
     * @param Detail|value-of<Detail> $detail
     */
    public function withDetail(Detail|string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    /**
     * Only fetch observations from hotspots.
     */
    public function withHotspot(bool $hotspot): self
    {
        $self = clone $this;
        $self['hotspot'] = $hotspot;

        return $self;
    }

    /**
     * Include observations which have not yet been reviewed.
     */
    public function withIncludeProvisional(bool $includeProvisional): self
    {
        $self = clone $this;
        $self['includeProvisional'] = $includeProvisional;

        return $self;
    }

    /**
     * Only fetch this number of observations.
     */
    public function withMaxResults(int $maxResults): self
    {
        $self = clone $this;
        $self['maxResults'] = $maxResults;

        return $self;
    }

    /**
     * Fetch observations from up to 50 locations.
     *
     * @param list<string> $r
     */
    public function withR(array $r): self
    {
        $self = clone $this;
        $self['r'] = $r;

        return $self;
    }

    /**
     * Include latest observation of the day, or the first added.
     *
     * @param Rank|value-of<Rank> $rank
     */
    public function withRank(Rank|string $rank): self
    {
        $self = clone $this;
        $self['rank'] = $rank;

        return $self;
    }

    /**
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $self = clone $this;
        $self['sppLocale'] = $sppLocale;

        return $self;
    }
}
