<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent;

use Phoebe\Core\Attributes\Api;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Data\Observations\Recent\RecentListParams\Cat;

/**
 * Get the list of recent observations (up to 30 days ago) of birds seen
 * in a country, state, county, or location. Results include only the most recent observation for each species in the region specified.
 *
 * @see Phoebe\Services\Data\Observations\RecentService::list()
 *
 * @phpstan-type RecentListParamsShape = array{
 *   back?: int,
 *   cat?: Cat|value-of<Cat>,
 *   hotspot?: bool,
 *   includeProvisional?: bool,
 *   maxResults?: int,
 *   r?: list<string>,
 *   sppLocale?: string,
 * }
 */
final class RecentListParams implements BaseModel
{
    /** @use SdkModel<RecentListParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * Fetch observations from up to 10 locations.
     *
     * @var list<string>|null $r
     */
    #[Api(list: 'string', optional: true)]
    public ?array $r;

    /**
     * Use this language for species common names.
     */
    #[Api(optional: true)]
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
     * @param Cat|value-of<Cat> $cat
     * @param list<string> $r
     */
    public static function with(
        ?int $back = null,
        Cat|string|null $cat = null,
        ?bool $hotspot = null,
        ?bool $includeProvisional = null,
        ?int $maxResults = null,
        ?array $r = null,
        ?string $sppLocale = null,
    ): self {
        $obj = new self;

        null !== $back && $obj->back = $back;
        null !== $cat && $obj['cat'] = $cat;
        null !== $hotspot && $obj->hotspot = $hotspot;
        null !== $includeProvisional && $obj->includeProvisional = $includeProvisional;
        null !== $maxResults && $obj->maxResults = $maxResults;
        null !== $r && $obj->r = $r;
        null !== $sppLocale && $obj->sppLocale = $sppLocale;

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
     * Fetch observations from up to 10 locations.
     *
     * @param list<string> $r
     */
    public function withR(array $r): self
    {
        $obj = clone $this;
        $obj->r = $r;

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
