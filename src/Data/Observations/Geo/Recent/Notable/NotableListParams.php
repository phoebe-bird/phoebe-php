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
 *   back?: int,
 *   detail?: Detail|value-of<Detail>,
 *   dist?: int,
 *   hotspot?: bool,
 *   maxResults?: int,
 *   sppLocale?: string,
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
        $obj = new self;

        $obj['lat'] = $lat;
        $obj['lng'] = $lng;

        null !== $back && $obj['back'] = $back;
        null !== $detail && $obj['detail'] = $detail;
        null !== $dist && $obj['dist'] = $dist;
        null !== $hotspot && $obj['hotspot'] = $hotspot;
        null !== $maxResults && $obj['maxResults'] = $maxResults;
        null !== $sppLocale && $obj['sppLocale'] = $sppLocale;

        return $obj;
    }

    public function withLat(float $lat): self
    {
        $obj = clone $this;
        $obj['lat'] = $lat;

        return $obj;
    }

    public function withLng(float $lng): self
    {
        $obj = clone $this;
        $obj['lng'] = $lng;

        return $obj;
    }

    /**
     * The number of days back to fetch observations.
     */
    public function withBack(int $back): self
    {
        $obj = clone $this;
        $obj['back'] = $back;

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
     * The search radius from the given position, in kilometers.
     */
    public function withDist(int $dist): self
    {
        $obj = clone $this;
        $obj['dist'] = $dist;

        return $obj;
    }

    /**
     * Only fetch observations from hotspots.
     */
    public function withHotspot(bool $hotspot): self
    {
        $obj = clone $this;
        $obj['hotspot'] = $hotspot;

        return $obj;
    }

    /**
     * Only fetch this number of observations.
     */
    public function withMaxResults(int $maxResults): self
    {
        $obj = clone $this;
        $obj['maxResults'] = $maxResults;

        return $obj;
    }

    /**
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $obj = clone $this;
        $obj['sppLocale'] = $sppLocale;

        return $obj;
    }
}
