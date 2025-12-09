<?php

declare(strict_types=1);

namespace Phoebe\Ref\Taxonomy\Ebird;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Concerns\SdkParams;
use Phoebe\Core\Contracts\BaseModel;
use Phoebe\Ref\Taxonomy\Ebird\EbirdRetrieveParams\Fmt;

/**
 * Get the taxonomy used by eBird. #### Notes Each entry in the taxonomy contains a species code for example, barswa for Barn Swallow. You can download the taxonomy for selected species using the *species* query parameter with a comma separating each code. Otherwise the full taxonomy is downloaded.
 *
 * @see Phoebe\Services\Ref\Taxonomy\EbirdService::retrieve()
 *
 * @phpstan-type EbirdRetrieveParamsShape = array{
 *   cat?: string,
 *   fmt?: Fmt|value-of<Fmt>,
 *   locale?: string,
 *   species?: string,
 *   version?: string,
 * }
 */
final class EbirdRetrieveParams implements BaseModel
{
    /** @use SdkModel<EbirdRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Only fetch records from these taxonomic categories.
     */
    #[Optional]
    public ?string $cat;

    /**
     * Fetch the records in CSV or JSON format.
     *
     * @var value-of<Fmt>|null $fmt
     */
    #[Optional(enum: Fmt::class)]
    public ?string $fmt;

    /**
     * Use this language for common names.
     */
    #[Optional]
    public ?string $locale;

    /**
     * Only fetch records for these species.
     */
    #[Optional]
    public ?string $species;

    /**
     * Fetch a specific version of the taxonomy.
     */
    #[Optional]
    public ?string $version;

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
        ?string $cat = null,
        Fmt|string|null $fmt = null,
        ?string $locale = null,
        ?string $species = null,
        ?string $version = null,
    ): self {
        $obj = new self;

        null !== $cat && $obj['cat'] = $cat;
        null !== $fmt && $obj['fmt'] = $fmt;
        null !== $locale && $obj['locale'] = $locale;
        null !== $species && $obj['species'] = $species;
        null !== $version && $obj['version'] = $version;

        return $obj;
    }

    /**
     * Only fetch records from these taxonomic categories.
     */
    public function withCat(string $cat): self
    {
        $obj = clone $this;
        $obj['cat'] = $cat;

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

    /**
     * Use this language for common names.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    /**
     * Only fetch records for these species.
     */
    public function withSpecies(string $species): self
    {
        $obj = clone $this;
        $obj['species'] = $species;

        return $obj;
    }

    /**
     * Fetch a specific version of the taxonomy.
     */
    public function withVersion(string $version): self
    {
        $obj = clone $this;
        $obj['version'] = $version;

        return $obj;
    }
}
