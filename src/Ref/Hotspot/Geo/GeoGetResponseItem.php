<?php

declare(strict_types=1);

namespace Phoebe\Ref\Hotspot\Geo;

use Phoebe\Core\Attributes\Optional;
use Phoebe\Core\Concerns\SdkModel;
use Phoebe\Core\Contracts\BaseModel;

/**
 * @phpstan-type GeoGetResponseItemShape = array{
 *   countryCode?: string|null,
 *   lat?: float|null,
 *   latestObsDt?: string|null,
 *   lng?: float|null,
 *   locId?: string|null,
 *   locName?: string|null,
 *   numSpeciesAllTime?: int|null,
 *   subnational1Code?: string|null,
 *   subnational2Code?: string|null,
 * }
 */
final class GeoGetResponseItem implements BaseModel
{
    /** @use SdkModel<GeoGetResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $countryCode;

    #[Optional]
    public ?float $lat;

    #[Optional]
    public ?string $latestObsDt;

    #[Optional]
    public ?float $lng;

    #[Optional]
    public ?string $locId;

    #[Optional]
    public ?string $locName;

    #[Optional]
    public ?int $numSpeciesAllTime;

    #[Optional]
    public ?string $subnational1Code;

    #[Optional]
    public ?string $subnational2Code;

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
        ?string $countryCode = null,
        ?float $lat = null,
        ?string $latestObsDt = null,
        ?float $lng = null,
        ?string $locId = null,
        ?string $locName = null,
        ?int $numSpeciesAllTime = null,
        ?string $subnational1Code = null,
        ?string $subnational2Code = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $lat && $obj['lat'] = $lat;
        null !== $latestObsDt && $obj['latestObsDt'] = $latestObsDt;
        null !== $lng && $obj['lng'] = $lng;
        null !== $locId && $obj['locId'] = $locId;
        null !== $locName && $obj['locName'] = $locName;
        null !== $numSpeciesAllTime && $obj['numSpeciesAllTime'] = $numSpeciesAllTime;
        null !== $subnational1Code && $obj['subnational1Code'] = $subnational1Code;
        null !== $subnational2Code && $obj['subnational2Code'] = $subnational2Code;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withLat(float $lat): self
    {
        $obj = clone $this;
        $obj['lat'] = $lat;

        return $obj;
    }

    public function withLatestObsDt(string $latestObsDt): self
    {
        $obj = clone $this;
        $obj['latestObsDt'] = $latestObsDt;

        return $obj;
    }

    public function withLng(float $lng): self
    {
        $obj = clone $this;
        $obj['lng'] = $lng;

        return $obj;
    }

    public function withLocID(string $locID): self
    {
        $obj = clone $this;
        $obj['locId'] = $locID;

        return $obj;
    }

    public function withLocName(string $locName): self
    {
        $obj = clone $this;
        $obj['locName'] = $locName;

        return $obj;
    }

    public function withNumSpeciesAllTime(int $numSpeciesAllTime): self
    {
        $obj = clone $this;
        $obj['numSpeciesAllTime'] = $numSpeciesAllTime;

        return $obj;
    }

    public function withSubnational1Code(string $subnational1Code): self
    {
        $obj = clone $this;
        $obj['subnational1Code'] = $subnational1Code;

        return $obj;
    }

    public function withSubnational2Code(string $subnational2Code): self
    {
        $obj = clone $this;
        $obj['subnational2Code'] = $subnational2Code;

        return $obj;
    }
}
