<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Nearest\GeoSpecies;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
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
 *   back?: int|null,
 *   dist?: int|null,
 *   hotspot?: bool|null,
 *   includeProvisional?: bool|null,
 *   maxResults?: int|null,
 *   sppLocale?: string|null,
 * }
 */
final class GeoSpecieListParams implements BaseModel
{
    /** @use SdkModel<GeoSpecieListParamsShape> */
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
     * Only fetch observations within this distance of the provided lat/lng.
     */
    #[Optional]
    public ?int $dist;

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
     * Only fetch up to this number of observations.
     */
    #[Optional]
    public ?int $maxResults;

    /**
     * Use this language for species common names.
     */
    #[Optional]
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
        $self = new self;

        $self['lat'] = $lat;
        $self['lng'] = $lng;

        null !== $back && $self['back'] = $back;
        null !== $dist && $self['dist'] = $dist;
        null !== $hotspot && $self['hotspot'] = $hotspot;
        null !== $includeProvisional && $self['includeProvisional'] = $includeProvisional;
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
     * Only fetch observations within this distance of the provided lat/lng.
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
     * Include observations which have not yet been reviewed.
     */
    public function withIncludeProvisional(bool $includeProvisional): self
    {
        $self = clone $this;
        $self['includeProvisional'] = $includeProvisional;

        return $self;
    }

    /**
     * Only fetch up to this number of observations.
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
