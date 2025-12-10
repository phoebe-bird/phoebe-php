<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Notable;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Data\Observations\Recent\Notable\NotableListParams\Detail;

/**
 * Get the list of recent, notable observations (up to 30 days ago) of birds seen in a country, region or location. Notable observations can be for locally or nationally rare species or are otherwise unusual, e.g. over-wintering birds in a species which is normally only a summer visitor.
 *
 * @see Phoebe\Services\Data\Observations\Recent\NotableService::list()
 *
 * @phpstan-type NotableListParamsShape = array{
 *   back?: int,
 *   detail?: Detail|value-of<Detail>,
 *   hotspot?: bool,
 *   maxResults?: int,
 *   r?: list<string>,
 *   sppLocale?: string,
 * }
 */
final class NotableListParams implements BaseModel
{
    /** @use SdkModel<NotableListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of days back to fetch observations.
     */
    #[Optional]
    public ?int $back;

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
     * Only fetch this number of observations.
     */
    #[Optional]
    public ?int $maxResults;

    /**
     * Fetch observations from up to 10 locations.
     *
     * @var list<string>|null $r
     */
    #[Optional(list: 'string')]
    public ?array $r;

    /**
     * Use this language for species common names.
     */
    #[Optional]
    public ?string $sppLocale;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Detail|value-of<Detail> $detail
     * @param list<string> $r
     */
    public static function with(
        ?int $back = null,
        Detail|string|null $detail = null,
        ?bool $hotspot = null,
        ?int $maxResults = null,
        ?array $r = null,
        ?string $sppLocale = null,
    ): self {
        $self = new self;

        null !== $back && $self['back'] = $back;
        null !== $detail && $self['detail'] = $detail;
        null !== $hotspot && $self['hotspot'] = $hotspot;
        null !== $maxResults && $self['maxResults'] = $maxResults;
        null !== $r && $self['r'] = $r;
        null !== $sppLocale && $self['sppLocale'] = $sppLocale;

        return $self;
    }

    /**
     * The number of days back to fetch observations.
     */
    public function withBack(int $back): self
    {
        $self = clone $this;
        $self['back'] = $back;

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
     * Only fetch this number of observations.
     */
    public function withMaxResults(int $maxResults): self
    {
        $self = clone $this;
        $self['maxResults'] = $maxResults;

        return $self;
    }

    /**
     * Fetch observations from up to 10 locations.
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
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $self = clone $this;
        $self['sppLocale'] = $sppLocale;

        return $self;
    }
}
