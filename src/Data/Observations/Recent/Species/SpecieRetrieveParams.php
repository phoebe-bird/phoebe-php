<?php

declare(strict_types=1);

namespace Phoebe\Data\Observations\Recent\Species;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Attributes\Required;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;

/**
 * Get the recent observations, up to 30 days ago, of a particular species
 * in a country, region or location. Results include only the most recent observation from each location in the region specified.
 * #### Notes.
 *
 * The species code is typically a 6-letter code, e.g. cangoo for Canada Goose. You can
 * get complete set of species code from the GET eBird Taxonomy end-point.
 *
 * When using the *r* query parameter set the *regionCode* URL parameter to an empty string.
 *
 * @see Phoebe\Services\Data\Observations\Recent\SpeciesService::retrieve()
 *
 * @phpstan-type SpecieRetrieveParamsShape = array{
 *   regionCode: string,
 *   back?: int|null,
 *   hotspot?: bool|null,
 *   includeProvisional?: bool|null,
 *   maxResults?: int|null,
 *   r?: list<string>|null,
 *   sppLocale?: string|null,
 * }
 */
final class SpecieRetrieveParams implements BaseModel
{
    /** @use SdkModel<SpecieRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $regionCode;

    /**
     * The number of days back to fetch observations.
     */
    #[Optional]
    public ?int $back;

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

    /**
     * `new SpecieRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpecieRetrieveParams::with(regionCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpecieRetrieveParams)->withRegionCode(...)
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
     * @param list<string> $r
     */
    public static function with(
        string $regionCode,
        ?int $back = null,
        ?bool $hotspot = null,
        ?bool $includeProvisional = null,
        ?int $maxResults = null,
        ?array $r = null,
        ?string $sppLocale = null,
    ): self {
        $self = new self;

        $self['regionCode'] = $regionCode;

        null !== $back && $self['back'] = $back;
        null !== $hotspot && $self['hotspot'] = $hotspot;
        null !== $includeProvisional && $self['includeProvisional'] = $includeProvisional;
        null !== $maxResults && $self['maxResults'] = $maxResults;
        null !== $r && $self['r'] = $r;
        null !== $sppLocale && $self['sppLocale'] = $sppLocale;

        return $self;
    }

    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

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
