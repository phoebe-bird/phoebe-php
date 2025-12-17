<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent;

use Phoebe\Core\Attributes\Optional;
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
 *   back?: int|null,
 *   cat?: null|Cat|value-of<Cat>,
 *   hotspot?: bool|null,
 *   includeProvisional?: bool|null,
 *   maxResults?: int|null,
 *   r?: list<string>|null,
 *   sppLocale?: string|null,
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
    #[Optional]
    public ?int $back;

    /**
     * Only fetch observations from these taxonomic categories.
     *
     * @var value-of<Cat>|null $cat
     */
    #[Optional(enum: Cat::class)]
    public ?string $cat;

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
        $self = new self;

        null !== $back && $self['back'] = $back;
        null !== $cat && $self['cat'] = $cat;
        null !== $hotspot && $self['hotspot'] = $hotspot;
        null !== $includeProvisional && $self['includeProvisional'] = $includeProvisional;
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
     * Only fetch observations from these taxonomic categories.
     *
     * @param Cat|value-of<Cat> $cat
     */
    public function withCat(Cat|string $cat): self
    {
        $self = clone $this;
        $self['cat'] = $cat;

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
