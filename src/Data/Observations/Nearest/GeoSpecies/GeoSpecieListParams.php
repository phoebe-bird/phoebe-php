<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Nearest\GeoSpecies;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Find the nearest locations where a species has been seen recently. #### Notes The species code is typically a 6-letter code, e.g. barswa for Barn Swallow. You can get complete set of species code from the GET eBird Taxonomy end-point.
 *
 * @see Phoebe\Services\Data\Observations\Nearest\GeoSpeciesService::list()
 *
 * @phpstan-type GeoSpecieListParamsShape = array{
 *   lat: float,
 *   lng: float,
 *   back?: int,
 *   dist?: int,
 *   hotspot?: bool,
 *   includeProvisional?: bool,
 *   maxResults?: int,
 *   sppLocale?: string,
 * }
 */
final class GeoSpecieListParams implements BaseModel
{
    /** @use SdkModel<GeoSpecieListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public float $lat;

    #[Api]
    public float $lng;

    /**
     * The number of days back to fetch observations.
     */
    #[Api(optional: true)]
    public ?int $back;

    /**
     * Only fetch observations within this distance of the provided lat/lng.
     */
    #[Api(optional: true)]
    public ?int $dist;

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
     * Only fetch up to this number of observations.
     */
    #[Api(optional: true)]
    public ?int $maxResults;

    /**
     * Use this language for species common names.
     */
    #[Api(optional: true)]
    public ?string $sppLocale;

    /**
     * `new GeoSpecieListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GeoSpecieListParams::with(lat: ..., lng: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GeoSpecieListParams)->withLat(...)->withLng(...)
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
     */
    public static function with(
        float $lat,
        float $lng,
        ?int $back = null,
        ?int $dist = null,
        ?bool $hotspot = null,
        ?bool $includeProvisional = null,
        ?int $maxResults = null,
        ?string $sppLocale = null,
    ): self {
        $obj = new self;

        $obj['lat'] = $lat;
        $obj['lng'] = $lng;

        null !== $back && $obj['back'] = $back;
        null !== $dist && $obj['dist'] = $dist;
        null !== $hotspot && $obj['hotspot'] = $hotspot;
        null !== $includeProvisional && $obj['includeProvisional'] = $includeProvisional;
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
     * Only fetch observations within this distance of the provided lat/lng.
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
     * Include observations which have not yet been reviewed.
     */
    public function withIncludeProvisional(bool $includeProvisional): self
    {
        $obj = clone $this;
        $obj['includeProvisional'] = $includeProvisional;

        return $obj;
    }

    /**
     * Only fetch up to this number of observations.
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
