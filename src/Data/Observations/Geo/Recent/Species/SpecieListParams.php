<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Geo\Recent\Species;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Get all observations of a species, seen up to 30 days ago, at any location within a radius of up to 50 kilometers, from a given set of coordinates. Results include only the most recent observation from each location in the region specified.
 *
 * #### URL parameters
 *
 * | Name | Description |
 * | ---------- | ----------- |
 * | speciesCode | The eBird species code. |
 * #### Notes
 * The species code is typically a 6-letter code, e.g. horlar for Horned Lark. You can get complete set of species code from the GET eBird Taxonomy end-point.
 *
 * @see Phoebe\Services\Data\Observations\Geo\Recent\SpeciesService::list()
 *
 * @phpstan-type SpecieListParamsShape = array{
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
final class SpecieListParams implements BaseModel
{
    /** @use SdkModel<SpecieListParamsShape> */
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
     * Use this language for species common names.
     */
    #[Optional]
    public ?string $sppLocale;

    /**
     * `new SpecieListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpecieListParams::with(lat: ..., lng: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpecieListParams)->withLat(...)->withLng(...)
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
     * Use this language for species common names.
     */
    public function withSppLocale(string $sppLocale): self
    {
        $self = clone $this;
        $self['sppLocale'] = $sppLocale;

        return $self;
    }
}
