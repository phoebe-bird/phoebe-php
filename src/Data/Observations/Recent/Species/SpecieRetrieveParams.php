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
 *   back?: int,
 *   hotspot?: bool,
 *   includeProvisional?: bool,
 *   maxResults?: int,
 *   r?: list<string>,
 *   sppLocale?: string,
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
        $obj = new self;

        $obj['regionCode'] = $regionCode;

        null !== $back && $obj['back'] = $back;
        null !== $hotspot && $obj['hotspot'] = $hotspot;
        null !== $includeProvisional && $obj['includeProvisional'] = $includeProvisional;
        null !== $maxResults && $obj['maxResults'] = $maxResults;
        null !== $r && $obj['r'] = $r;
        null !== $sppLocale && $obj['sppLocale'] = $sppLocale;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['regionCode'] = $regionCode;

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
     * Only fetch this number of observations.
     */
    public function withMaxResults(int $maxResults): self
    {
        $obj = clone $this;
        $obj['maxResults'] = $maxResults;

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
        $obj['r'] = $r;

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
