<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Geo\Recent;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Cat;
use Phoebe\Data\Observations\Geo\Recent\RecentListParams\Sort;

/**
 * Get the list of recent observations (up to 30 days ago) of birds seen
 * at locations within a radius of up to 50 kilometers, from a given set
 * of coordinates. Results include only the most recent observation for each species in the region specified.
 *
 * @see Phoebe\Services\Data\Observations\Geo\RecentService::list()
 *
 * @phpstan-type RecentListParamsShape = array{
 *   lat: float,
 *   lng: float,
 *   back?: int,
 *   cat?: Cat|value-of<Cat>,
 *   dist?: int,
 *   hotspot?: bool,
 *   includeProvisional?: bool,
 *   maxResults?: int,
 *   sort?: Sort|value-of<Sort>,
 *   sppLocale?: string,
 * }
 */
final class RecentListParams implements BaseModel
{
    /** @use SdkModel<RecentListParamsShape> */
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
     * Only fetch observations from these taxonomic categories.
     *
     * @var value-of<Cat>|null $cat
     */
    #[Api(enum: Cat::class, optional: true)]
    public ?string $cat;

    /**
     * The search radius from the given position, in kilometers.
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
     * Only fetch this number of observations.
     */
    #[Api(optional: true)]
    public ?int $maxResults;

    /**
     * Sort observations by taxonomy or by date, most recent first.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Api(enum: Sort::class, optional: true)]
    public ?string $sort;

    /**
     * Use this language for species common names.
     */
    #[Api(optional: true)]
    public ?string $sppLocale;

    /**
     * `new RecentListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecentListParams::with(lat: ..., lng: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecentListParams)->withLat(...)->withLng(...)
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
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        float $lat,
        float $lng,
        ?int $back = null,
        Cat|string|null $cat = null,
        ?int $dist = null,
        ?bool $hotspot = null,
        ?bool $includeProvisional = null,
        ?int $maxResults = null,
        Sort|string|null $sort = null,
        ?string $sppLocale = null,
    ): self {
        $obj = new self;

        $obj->lat = $lat;
        $obj->lng = $lng;

        null !== $back && $obj->back = $back;
        null !== $cat && $obj['cat'] = $cat;
        null !== $dist && $obj->dist = $dist;
        null !== $hotspot && $obj->hotspot = $hotspot;
        null !== $includeProvisional && $obj->includeProvisional = $includeProvisional;
        null !== $maxResults && $obj->maxResults = $maxResults;
        null !== $sort && $obj['sort'] = $sort;
        null !== $sppLocale && $obj->sppLocale = $sppLocale;

        return $obj;
    }

    public function withLat(float $lat): self
    {
        $obj = clone $this;
        $obj->lat = $lat;

        return $obj;
    }

    public function withLng(float $lng): self
    {
        $obj = clone $this;
        $obj->lng = $lng;

        return $obj;
    }

    /**
     * The number of days back to fetch observations.
     */
    public function withBack(int $back): self
    {
        $obj = clone $this;
        $obj->back = $back;

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
     * The search radius from the given position, in kilometers.
     */
    public function withDist(int $dist): self
    {
        $obj = clone $this;
        $obj->dist = $dist;

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
     * Sort observations by taxonomy or by date, most recent first.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

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
