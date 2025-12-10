<?php

declare(strict_types=1);

namespace Phoebe\Ref\Hotspot\Geo;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Ref\Hotspot\Geo\GeoRetrieveParams\Fmt;

/**
 * Get the list of hotspots, within a radius of up to 50 kilometers, from a given set of coordinates.
 *
 * @see Phoebe\Services\Ref\Hotspot\GeoService::retrieve()
 *
 * @phpstan-type GeoRetrieveParamsShape = array{
 *   lat: float, lng: float, back?: int, dist?: int, fmt?: Fmt|value-of<Fmt>
 * }
 */
final class GeoRetrieveParams implements BaseModel
{
    /** @use SdkModel<GeoRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public float $lat;

    #[Required]
    public float $lng;

    /**
     * The number of days back to fetch hotspots.
     */
    #[Optional]
    public ?int $back;

    /**
     * The search radius from the given position, in kilometers.
     */
    #[Optional]
    public ?int $dist;

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @var value-of<Fmt>|null $fmt
     */
    #[Optional(enum: Fmt::class)]
    public ?string $fmt;

    /**
     * `new GeoRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GeoRetrieveParams::with(lat: ..., lng: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GeoRetrieveParams)->withLat(...)->withLng(...)
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
        float $lat,
        float $lng,
        ?int $back = null,
        ?int $dist = null,
        Fmt|string|null $fmt = null,
    ): self {
        $self = new self;

        $self['lat'] = $lat;
        $self['lng'] = $lng;

        null !== $back && $self['back'] = $back;
        null !== $dist && $self['dist'] = $dist;
        null !== $fmt && $self['fmt'] = $fmt;

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
     * The number of days back to fetch hotspots.
     */
    public function withBack(int $back): self
    {
        $self = clone $this;
        $self['back'] = $back;

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
