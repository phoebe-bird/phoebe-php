<?php

declare(strict_types=1);

namespace Phoebe\Ref\Hotspot\Geo;

use Phoebe\Core\Attributes\Api;
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

    #[Api]
    public float $lat;

    #[Api]
    public float $lng;

    /**
     * The number of days back to fetch hotspots.
     */
    #[Api(optional: true)]
    public ?int $back;

    /**
     * The search radius from the given position, in kilometers.
     */
    #[Api(optional: true)]
    public ?int $dist;

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @var value-of<Fmt>|null $fmt
     */
    #[Api(enum: Fmt::class, optional: true)]
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
        $obj = new self;

        $obj['lat'] = $lat;
        $obj['lng'] = $lng;

        null !== $back && $obj['back'] = $back;
        null !== $dist && $obj['dist'] = $dist;
        null !== $fmt && $obj['fmt'] = $fmt;

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
     * The number of days back to fetch hotspots.
     */
    public function withBack(int $back): self
    {
        $obj = clone $this;
        $obj['back'] = $back;

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
     * Fetch the records in CSV or JSON format.
     *
     * @param Fmt|value-of<Fmt> $fmt
     */
    public function withFmt(Fmt|string $fmt): self
    {
        $obj = clone $this;
        $obj['fmt'] = $fmt;

        return $obj;
    }
}
