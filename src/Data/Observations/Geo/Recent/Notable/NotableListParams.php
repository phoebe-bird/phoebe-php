<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Geo\Recent\Notable;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Data\Observations\Geo\Recent\Notable\NotableListParams\Detail;

/**
 * Get the list of notable observations (up to 30 days ago) of birds seen at locations within a radius of up to 50 kilometers, from a given set of coordinates. Notable observations can be for locally or nationally rare species or are otherwise unusual, for example over-wintering birds in a species which is normally only a summer visitor.
 *
 * @see Phoebe\Services\Data\Observations\Geo\Recent\NotableService::list()
 *
 * @phpstan-type NotableListParamsShape = array{
 *   lat: float,
 *   lng: float,
 *   back?: int|null,
 *   detail?: null|Detail|value-of<Detail>,
 *   dist?: int|null,
 *   hotspot?: bool|null,
 *   maxResults?: int|null,
 *   sppLocale?: string|null,
 * }
 */
final class NotableListParams implements BaseModel
{
    /** @use SdkModel<NotableListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public float $lat;

    #[Required]
    public float $lng;

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
     * The search radius from the given position, in kilometers.
     */
    #[Optional]
    public ?int $dist;

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
     * Use this language for species common names.
     */
    #[Optional]
    public ?string $sppLocale;

    /**
     * `new NotableListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotableListParams::with(lat: ..., lng: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotableListParams)->withLat(...)->withLng(...)
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
     * @param Detail|value-of<Detail> $detail
     */
    public static function with(
        float $lat,
        float $lng,
        ?int $back = null,
        Detail|string|null $detail = null,
        ?int $dist = null,
        ?bool $hotspot = null,
        ?int $maxResults = null,
        ?string $sppLocale = null,
    ): self {
        $self = new self;

        $self['lat'] = $lat;
        $self['lng'] = $lng;

        null !== $back && $self['back'] = $back;
        null !== $detail && $self['detail'] = $detail;
        null !== $dist && $self['dist'] = $dist;
        null !== $hotspot && $self['hotspot'] = $hotspot;
        null !== $maxResults && $self['maxResults'] = $maxResults;
        null !== $sppLocale && $self['sppLocale'] = $sppLocale;

        return $self;
    }

    public function withLat(float $lat): self
    {
        $self = clone $this;
        $self['lat'] = $lat;

        return $self;
    }

    public function withLng(float $lng): self
    {
        $self = clone $this;
        $self['lng'] = $lng;

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
     * The search radius from the given position, in kilometers.
     */
    public function withDist(int $dist): self
    {
        $self = clone $this;
        $self['dist'] = $dist;

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
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $self = clone $this;
        $self['sppLocale'] = $sppLocale;

        return $self;
    }
}
